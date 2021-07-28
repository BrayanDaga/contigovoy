<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 izquierda">
            <p>Muchas gracias por tu visita, nos encantaría que nos <br> dejes en tus consultas, dudas o sugerencias sobre nuestro <br> servicio y te responderemos lo más pronto posible. </p>

            <form class="formulario1" action="/" method="post">
                <input type="text" name="action"  value="enviarEmail" style="display:none;"/>
                <input type="text" placeholder="Nombres" name="nombre" />
                <input type="email" placeholder="Correo" name="email" />
                <input type="text" placeholder="Celular" name="telefono" />
                <input class="mt-5" type="text" placeholder="mensaje" name="mensaje" />
                <input class="b " type="submit" value="enviar">
            </form>
        </div>

        <div class="col-md-5 derecha">
            <img class="center-block " src="<?= IMAGES ?>/form2.webp" alt="">
        </div>
    </div>
</div>


