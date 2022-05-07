<?php include("templates/header.php"); ?>
<h1>Contáctenos</h1>
<div class="container-contact">
    <div class="row">
        <div class="contact">           
                <div class="row align-items-center">
                    <div class="col-md-5">
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Oficina principal</h3>
                                <p>Medellin, colombia</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Llamanos</h3>
                                <p>+57 320 2541578</p>
                            </div>
                        </div>
                        <div class="contact-info">
                            <div class="contact-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h3>Correo electronico</h3>
                                <p>ambiental@gmail.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="contact-form">
                            <div id="success">
                                 <form name="sentMessage" id="contactForm" novalidate="novalidate">
                                     <div class="control-group">
                                         <input type="text" class="form-control" id="name" placeholder="Nombre"
                                        required="required" data-validation-required-message="por favor ingrese su nombre" />
                                         <p class="help-block text-danger"></p>
                                     </div>
                                     <div class="control-group">
                                         <input type="email" class="form-control" id="email" placeholder="Email"
                                          required="required"
                                          data-validation-required-message="por favor ingrese su email" />
                                         <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                         <input type="text" class="form-control" id="subject" placeholder="Asunto"
                                         required="required" data-validation-required-message="Por favor ingrese el asunto" />
                                         <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                          <textarea class="form-control" id="message" placeholder="Mensaje"
                                          required="required"
                                          data-validation-required-message="Por favor ingrese el mensaje"></textarea>
                                        <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn" type="submit" id="sendMessageButton">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("templates/footer.php"); ?>