@extends('layouts.main')

@section('title', 'Formulario')

@section('content')

<div>        
    <a href="{{ route('user') }}">
        <div class="back-button">&#8592;</div>  
    </a>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ingresa los datos de tu evento</h2>

        <form id="formEvento">
            <!-- Localidad -->
            <div class="mb-3">
                <label for="localidad" class="form-label">Localidad</label>
                <select class="form-select" id="localidad" required>
                    <option selected disabled>Selecciona tu localidad</option>
                    <option value="1">Palermo, Buenos Aires.</option>
                    <option value="2">La Plata, Buenos Aires.</option>
                    <option value="3">San Isidro, Buenos Aires.</option>
                    <option value="4">Villa Crespo, Buenos Aires.</option>
                </select>
            </div>

            <!-- Categoría de Evento -->
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría de Evento</label>
                <select class="form-select" id="categoria" required>
                    <option selected disabled>Selecciona una categoría</option>
                    <option value="1">Cerámica</option>
                    <option value="2">Joyería</option>
                    <option value="3">Pintura</option>
                    <option value="4">Música</option>
                    <option value="5">Teatro</option>
                    <option value="6">Cine</option>
                    <option value="7">Deportes</option>
                    <option value="8">Conferencias</option>
                    <option value="9">Tecnología</option>
                    <option value="10">Moda</option>
                </select>
            </div>

            <!-- <button type="button" class="btn btn-outline-primary btn-sm mb-4">Agregar Categoría</button> -->

            <!-- Nombre del Evento -->
            <div class="mb-3">
                <label for="nombreEvento" class="form-label">Nombre del Evento</label>
                <input type="text" class="form-control" id="nombreEvento" placeholder="Ingresa el nombre del evento" required>
            </div>

            <!-- Descripción del Evento -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción del Evento</label>
                <textarea class="form-control" id="descripcion" rows="3" placeholder="Describe tu evento aquí..." required></textarea>
            </div>

            <!-- Fecha y Hora de Inicio -->
            <div class="mb-3">
                <label for="fechaInicio" class="form-label">Fecha y Hora de Inicio</label>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" id="fechaInicio" required>
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" id="horaInicio" required>
                    </div>
                </div>
            </div>

            <!-- Fecha y Hora de Finalización -->
            <div class="mb-3">
                <label for="fechaFin" class="form-label">Fecha y Hora de Finalización</label>
                <div class="row">
                    <div class="col">
                        <input type="date" class="form-control" id="fechaFin" required>
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" id="horaFin" required>
                    </div>
                </div>
            </div>

            <!-- Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" placeholder="Ingresa la dirección del evento" required>
            </div>

            <!-- Precio del Evento -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio del Evento</label>
                <select class="form-select" id="precio" required>
                    <option selected disabled>Selecciona el tipo de precio</option>
                    <option value="gratis">Gratis</option>
                    <option value="pago">Pago</option>
                </select>
            </div>

            <!-- Acepto términos y condiciones -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terminos" data-bs-toggle="modal" data-bs-target="#terminosModal" required>
                <label class="form-check-label" for="terminos">
                    Acepto términos y condiciones
                </label>
            </div>

            <!-- Botón Crear Evento -->
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-primary" id="crearEventoBtn">Crear Evento</button>
            </div>

            <!-- Notificación de éxito -->
            <div id="notificacion" class="alert alert-success mt-3" style="display: none;" role="alert">
                ¡Evento creado con éxito!
            </div>

            <!-- Notificación de cobro -->
            <div id="notificacionCobro" class="alert alert-warning mt-3" style="display: none;" role="alert">
                La aplicación cobrará un 35% de los ingresos del evento.
            </div>
        </form>
    </div>

    <!-- Modal Términos y Condiciones -->
    <div class="modal fade" id="terminosModal" tabindex="-1" aria-labelledby="terminosModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="terminosModalLabel">Términos y Condiciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6>Términos y Condiciones de Uso</h6>
                    <p><strong>Fecha de entrada en vigor: [Fecha]</strong></p>

                    <p>Gracias por utilizar nuestra aplicación de eventos. Al acceder o usar nuestra aplicación, aceptas estos Términos y Condiciones. Si no estás de acuerdo con estos términos, te recomendamos no utilizar la aplicación.</p>

                    <h6>1. Uso de la aplicación</h6>
                    <p>Nuestra aplicación está diseñada para facilitar la creación, descubrimiento y participación en eventos. Al usarla, te comprometes a no usar la aplicación para fines ilegales o no autorizados y a cumplir con todas las leyes locales aplicables.</p>

                    <h6>2. Registro y cuenta de usuario</h6>
                    <p>Para acceder a ciertas funciones, como la creación de eventos o la inscripción en eventos, necesitarás registrarte y crear una cuenta. Debes proporcionar información precisa y mantener la confidencialidad de tu cuenta. Eres responsable de todas las actividades realizadas bajo tu cuenta.</p>

                    <h6>3. Publicación de eventos</h6>
                    <p>Como usuario, puedes crear eventos dentro de la aplicación. Al crear un evento, te comprometes a proporcionar información precisa y a no crear eventos que violen los derechos de otras personas o que sean inapropiados, ofensivos o ilegales.</p>

                    <h6>4. Participación en eventos</h6>
                    <p>Los usuarios pueden inscribirse y asistir a eventos publicados en la plataforma. Al registrarte en un evento, aceptas cumplir con las reglas y regulaciones del evento, que pueden incluir restricciones sobre el acceso, el comportamiento y el uso de los recursos del evento.</p>

                    <h6>5. Propiedad intelectual</h6>
                    <p>Todo el contenido disponible en la aplicación, incluidos textos, imágenes, logos y gráficos, es propiedad de la empresa o de los respectivos propietarios de los derechos de autor. No se permite el uso no autorizado de este contenido sin el consentimiento expreso de los propietarios.</p>

                    <h6>6. Responsabilidad</h6>
                    <p>No nos hacemos responsables de la calidad, seguridad o cualquier problema relacionado con los eventos creados o en los que participes. La participación en los eventos es bajo tu propio riesgo.</p>

                    <h6>7. Privacidad</h6>
                    <p>Tu privacidad es importante para nosotros. La recopilación y el uso de tu información personal se rigen por nuestra <a href="#">Política de Privacidad</a>. Al utilizar la aplicación, aceptas nuestras prácticas de privacidad.</p>

                    <h6>8. Modificaciones de los Términos</h6>
                    <p>Podemos actualizar o modificar estos Términos y Condiciones en cualquier momento. Te notificaremos sobre los cambios importantes a través de la aplicación o por correo electrónico.</p>

                    <h6>9. Terminación</h6>
                    <p>Nos reservamos el derecho de suspender o eliminar tu cuenta si se detecta un uso inapropiado o violaciones de estos Términos y Condiciones.</p>

                    <h6>10. Ley Aplicable</h6>
                    <p>Estos Términos y Condiciones se rigen por las leyes del [país o región] y cualquier disputa será resuelta ante los tribunales competentes de [ciudad o región].</p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <br>
</div>


<script>
    // Función para mostrar la notificación de cobro
    document.getElementById('precio').addEventListener('change', function() {
        const precio = this.value;
        
        // Mostrar notificación de cobro si es un evento de pago
        if (precio === 'pago') {
            const cobroNotification = document.getElementById('notificacionCobro');
            cobroNotification.style.display = 'block';
            setTimeout(function() {
                cobroNotification.style.display = 'none';
            }, 5000); // La notificación desaparecerá después de 5 segundos
        } else {
            const cobroNotification = document.getElementById('notificacionCobro');
            cobroNotification.style.display = 'none'; // Si es gratis, oculta la notificación
        }
    });

    // Mostrar notificación de evento creado
    document.getElementById('crearEventoBtn').addEventListener('click', function() {
        const form = document.getElementById('formEvento');
        if (form.checkValidity()) {
            // Mostrar notificación de éxito
            const notification = document.getElementById('notificacion');
            notification.style.display = 'block';
            setTimeout(function() {
                notification.style.display = 'none';
            }, 3000); // La notificación desaparecerá después de 3 segundos
        } else {
            form.reportValidity(); // Si hay campos vacíos, se muestra la validación
        }
    });

    // Google Maps Autocomplete para dirección
    let autocomplete;
    function initAutocomplete() {
        const input = document.getElementById('direccion');
        autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setFields(['address_component', 'geometry']);
    }

    window.onload = function() {
        initAutocomplete();
    }
</script>


@endsection

