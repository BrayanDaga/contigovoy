<?php

namespace controllers;

use Carbon\Carbon;
use models\WorkDay;
use models\Appointment;
use controllers\BaseController;

class HorarioController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    private function getDayFromDate($date)
    {
        $dateCarbon = new Carbon($date);

        // dayofWeek
        // Carbon: 0 (sunday) - 6 (saturday)
        // WorkDay: 0 (monday) - 6 (sunday)
        $i = $dateCarbon->dayOfWeek;
        $day = ($i == 0 ? 6 : $i - 1);
        return $day;
    }

    public function buscarDias(): void
    {
        $date = $this->f3->get('GET.date');
        $doctorId = $this->f3->get('GET.doctor_id');

         $intervals = $this->getAvailableIntervals($date, $doctorId);
         echo json_encode($intervals);

    }


    private function isAvailableInterval($date, $doctorId,  $start) :bool
    {

        $instance = new Appointment($this->f3->DB);
        $appointment = $instance->load(['day=? AND hour=? AND doctor_id=?', $date,  $start, $doctorId]);

        if ($appointment) {
            $exists = true;
        } else {
            $exists = false;
        }
        $instance->reset();

        return !$exists; // available if already none exists

    }

    public function getAvailableIntervals($date, $doctorId)
    {

        $instance = new WorkDay($this->f3->DB);
        $workDay = $instance->load(['day=? AND user_id=?', $this->getDayFromDate($date), $doctorId]);
        if (!$workDay) {
            return [];
        }

        $morningIntervals = $this->getIntervals(
            $workDay['morning_start'],
            $workDay['morning_end'],
            $date,
            $doctorId
        );

        $afternoonIntervals = $this->getIntervals(
            $workDay['afternoon_start'],
            $workDay['afternoon_end'],
            $date,
            $doctorId
        );

        $data = [];
        $data['morning'] = $morningIntervals;
        $data['afternoon'] = $afternoonIntervals;
        $instance->reset();

        return $data;
    }



    private function getIntervals($start, $end, $date, $doctorId)
    {
        $start = new Carbon($start);
        $end = new Carbon($end);

        $intervals = [];

        while ($start < $end) {
            $interval = [];

            $interval['start']  = $start->format('g:i A');

            $available = $this->isAvailableInterval($date, $doctorId, $start);

            $start->addMinutes(60);
            $interval['end']  = $start->format('g:i A');
        
            if ($available) {
                $intervals[] = $interval;
            }
        }

        return $intervals;
    }
}
