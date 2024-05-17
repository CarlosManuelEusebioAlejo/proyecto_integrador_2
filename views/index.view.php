<?php 
session_start();
?>

    </head>
        <body id="page-top">

            <?php 
                require_once 'views/header.php';
            ?>
             <?php 
                require_once 'views/carrousel.view.php'; 
            ?>

            <!-- linea del tiempo boostrap -->
            <section class="page-section" id="about">
            <div class="container py-5">
    <div class="row text-center text-white mb-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">DEPORTE Y NUTRICIÓN</h1>
            <p class="lead mb-0">DATOS INTERESANTES </p>
            </div>
        </div><!-- End -->


        <div class="row">
            <div class="col-lg-7 mx-auto">
                
                <!-- Timeline -->
                <ul class="timeline">
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0 text-center">5 curiosidades sobre salud que probablemente no sabías.</h2>
                        <p class="text-small mt-2 font-weight-light">Cada día hay más consciencia en la sociedad de la importancia de preocuparnos por nuestra salud, 
                                                                    y gracias a investigaciones y estudios de la ciencia, las personas tienen más cura de su salud y de 
                                                                    las diferentes actividades y hábitos que deben llevar a cabo para conseguir una mejor salud y calidad 
                                                                    de vida en general. Existen muchos datos sobre la salud humana que la mayoría de nosotros desconocemos 
                                                                    y que pueden resultar tan sorprendentes como útiles en nuestro día a día. Hoy te presentamos 5 datos
                                                                    curiosos sobre salud que probablemente no conocías.
                                                                    <br>
                                                                    link: <a href="https://cerba.com/5-curiosidades-de-salud-que-no-sabias/" target="_blank">https://cerba.com/5-curiosidades-de-salud-que-no-sabias/</a>
                        </p>
                        <div align="center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQWyzn2_GTOmlEYr13MNRFNPO5Um82rtFYUsg28xQdIuQ&s" alt="">
                        </div>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0 text-center">Las 5 curiosidades que no conocías sobre la alimentación saludable:</h2>
                        <p class="text-small mt-2 font-weight-light">La alimentación, para gran parte de la población, es una de las grandes preocupaciones del día a día,
                                                                    ya sea por tratar de mantener una alimentación saludable, tener una correcta previsión semanal del menú o
                                                                    por lograr alternar todos aquellos nutrientes que nuestro cuerpo necesita. Por ello, dentro de esta 
                                                                    preocupación por alimentarnos correctamente, pasamos por alto algunas curiosidades de los alimentos y el 
                                                                    estado de nuestro cuerpo, o bien, nos dejamos llevar por falsos mitos ¿nunca has escuchado que tienes que 
                                                                    beberte el zumo de naranja recién exprimido para que no pierda las vitaminas? ¡No es cierto!.
                                                                    <br>
                                                                    link: <a href="https://www.usisa.com/usisasabe-de-alimentacion-saludable-conocias-estas-curiosidades/" target="_blank">https://www.usisa.com/usisasabe-de-alimentacion-saludable-conocias-estas-curiosidades/</a>
                        </p>
                        <div align="center">
                            <img src="https://img.freepik.com/vector-premium/tienda-nutricion-suplemento-dietetico-minerales-como-frutas-frescas-o-verduras-ilustracion_2175-7792.jpg" alt="" width="300" height="200">
                        </div>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0 text-center">Datos claves sobre la actividad física, según OMS </h2>
                        <p class="text-small mt-2 font-weight-light">5 diciembre, 2022
                        <br>
                        La falta de actividad física es un factor de riesgo considerable para las enfermedades no transmisibles (ENT), como los accidentes cerebrovasculares, la diabetes y el cáncer.
                        Son muchos los países en los que la actividad física va en descenso. En el ámbito mundial, el 23% de los adultos y el 81% de los adolescentes en edad escolar no se mantienen suficientemente activos.
                        Conseguir que la gente se mueva es una estrategia importante para reducir la carga de ENT y el Plan de acción mundial de la OMS 2013-2020 hizo un llamamiento a reducir en un 10% la inactividad física para el 2025.
                        Si bien OMS realiza recomendaciones sobre la cantidad mínima de actividad para mejorar la salud en todos los grupos de edad, es importante ser consciente de que algo de actividad física siempre es mejor que nada.
                        Las personas inactivas deben comenzar realizando pequeñas cantidades de actividad física como parte de su rutina diaria e incrementar gradualmente su duración, frecuencia e intensidad.
                        Asimismo, los países y comunidades deben tomar medidas para ofrecer a las personas más oportunidades de mantenerse activas.
                        <br>
                        link: <a href="https://www.ospat.com.ar/blog/10-datos-claves-sobre-la-actividad-fisica/" target="_blank">https://www.ospat.com.ar/blog/10-datos-claves-sobre-la-actividad-fisica/</a>
                        </p>
                        <div align="center">
                            <img src="https://www.iberdrola.com/documents/20125/40948/mujer-deporte-alianza-exito-746x419.png/77d9c70c-fdd8-e9ad-0538-ad88a314ac0f?t=1701793959991" alt="" width="300" height="200">
                        </div>
                    </li>
                    <li class="timeline-item bg-white rounded ml-3 p-4 shadow">
                        <div class="timeline-arrow"></div>
                        <h2 class="h5 mb-0 text-center">Nutrición Para el Entrenamiento y la Competición </h2>
                        <p class="text-small mt-2 font-weight-light">La nutrición es un factor relevante en el rendimiento deportivo. El objetivo de la nutrición deportiva es aportar la cantidad de energía apropiada, otorgar nutrientes para
                                                                    la mantención y reparación de los tejidos y, mantener y regular el metabolismo corporal. Entre los macronutrientes más relevantes para el deportista están los Hidratos de Carbono, 
                                                                    cuyo aporte se ajusta de acuerdo al entrenamiento, semana previa a la competencia, día de la competición y recuperación. Otro aspecto central, es asegurar una hidratación adecuada, 
                                                                    para lo cual es fundamental implementar planes adaptados a los requerimientos individuales como parte del programa de entrenamiento. Finalmente, es importante considerar el uso de 
                                                                    suplementos en los deportistas basados en la evidencia de la medicina actual, de manera de obtener beneficios a partir de ellos, evitar riesgo de salud y de dopaje.
                                                                    <br>
                                                                    link: <a href="https://www.elsevier.es/es-revista-revista-medica-clinica-las-condes-202-articulo-nutricionpara-el-entrenamiento-competicion-S0716864012703085" target="_blank">https://www.elsevier.es/es-revista-revista-medica-clinica-las-condes-202-articulo-nutricionpara-el-entrenamiento-competicion-S0716864012703085</a>
                        </p>
                        <div align="center">
                            <img src="https://financialmagazine.es/wp-content/uploads/2023/06/nutricion-deportiva-1.jpg" alt="" width="300" height="200">
                        </div>
                    </li>
                </ul><!-- End -->

            </div>
        </div>
    </div>
    </section>
    <?php 

    require 'footer.php';

    ?>
<!-- 