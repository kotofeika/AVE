<?php
use Core\Session\SessionManager;
use Core\AdminCheck;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,500,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="/assets-my/front/main.css?nocache=1628434395" />
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="/favicon.ico?1607885902" rel="shortcut icon" type="image/x-icon"/>
    <meta http-equiv="content-type" content="text/html"/>

    <!--    <script src="/assets-my/generate/jquery.js"></script>-->
    <script src="http://static.w-gr.ru/jquery/jquery-1.9.1.min.js"></script>
    <!--    <script src="http://static.web-gr.ru/jquery/jquery-1.8.3.min.js"></script>-->

    <!--    <link rel="stylesheet" href="/assets-my/open-iconic-master/font/css/open-iconic-bootstrap.css" crossorigin="anonymous">-->

    <!--    <script type="text/javascript" src="--><!--/front/jquery.scrollTo-2.1.0/jquery.scrollTo.min.js"></script>-->

    <!--    <link href="/assets-my/front/css/style.css?time=--><!--" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="/assets-my/front/css/animate.min.css">

    <script src="/assets-my/front/jquery.cookie.js"></script>
    <script src="/assets-my/front/classie.js"></script>
    <script src="/assets-my/front/dynamics.min.js"></script>
    <script src="/assets-my/front/imagesloaded.pkgd.min.js"></script>
    <script src="/assets-my/front/masonry.pkgd.min.js"></script>
    <script src="/assets-my/front/modernizr.custom.js"></script>

    <!--    <link rel="stylesheet" href="/assets-my/front/wow/animate.min.css">-->

    <!--    <script src="http://static.web-gr.ru/pjax/pjax.js"></script>-->
    <!--    <script type="text/javascript" src="/assets-my/front/js/main.js?time=--><!--"></script>-->

    <!--    <link rel="stylesheet" href="--><!--/jq.lightbox0.5/jquery.lightbox-0.5.css?time=--><!--" />-->
    <!--    <script src="--><!--/jq.lightbox0.5/jquery.lightbox-0.5.pack.js"></script>-->


    <link rel="stylesheet" type="text/css" href="http://dvorec73.ru/assets-my/front/pager.css"/>

    <link rel="stylesheet" href="/assets-my/magnific-popup-master/dist/magnific-popup.css">
    <script src="/assets-my/magnific-popup-master/dist/jquery.magnific-popup.js"></script>

    <!--    <script type="text/javascript" src="/assets-my/blind/script.js?time=--><!--"></script>-->
    <!--    <link rel="stylesheet" type="text/css" href="/assets-my/blind/style.css?time=--><!--" />-->


    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

    <script>
        $(document).ready(function(){
            AOS.init();
        })
    </script>

    <!--    <script src="/assets-my/front/isogrid.js"></script>-->
    <script src="/assets-my/front/app.js?nocache=1698647865"></script>
    <!--    <link rel="stylesheet" href="/assets/main.css?nocache=--><!--" />-->
    <link rel="stylesheet" href="/assets-my/front/svg.css?nocache=1262749500" />

    <script type="text/javascript" src="/assets-my/adaptive-modal-master/jquery.adaptive-modal.js"></script>
    <link href='/assets-my/adaptive-modal-master/adaptive-modal.css' rel='stylesheet' type='text/css'>

    <link href='/assets-my/wysiwyg.css' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/bvi/css/bvi.css?1" type="text/css">
    <script src='/bvi/js/responsivevoice.min.js?ver=1.5.0'></script>
    <script src="/bvi/js/bvi-init-panel.min.js"></script>
    <script src="/bvi/js/bvi-min.js?1"></script>
    <script src="/bvi/js/js.cookie.js"></script>

    <!--    <script src="/assets-my/anime-master/lib/anime.min.js"></script>-->

    <meta name="yandex-verification" content="b5115962df5fda31" />

    <title>Дворец сегодня|Дворец творчества</title>

    <style type="text/css">
        h5{
            font-family: "Calibri Light";
            font-weight: bold;
        }
        body.about{
            padding-left: 40px;
            background-color: lightgray;
            font-family: "Calibri Light";
            font-weight: bold;
        }
        .sv_on {
            color: #fff;
        }

        .sv_on a {
            /*font-family:Arial;*/
            color: #fff;
            font-size: 19px;
        }

        .sv_on a:hover {
            color: #ccccff;
        }

        h3, h2, h1 {
            font-weight: 300;

    </style>
</head>
<body class="about">

<?php if ( SessionManager::create()->isAuthorized() && (AdminCheck::Check()['Admin'] != null) ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <font color="red">(Admin)</font>
                    </li>
                    <a class="nav-link" href="/logout"><img src="images/logout.jpg" height="20" alt="error"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<?php } else if  (SessionManager::create()->isAuthorized() ) { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
                    </li>
                    <li>
                        <a class="nav-link" href="/logout"><img src="images/logout.jpg" height="20" alt="error"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Дом творчества детей и молодежи</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Главная
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/about">О нас</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/schedule">Расписание</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Контакты</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile"><?= SessionManager::create()->user('user_name')?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/authorization">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Зарегистрироваться</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>
<?php } ?>

    <div class="content">

        <div class="container">

            <div class="breadcrumbs">
                <p>About</p>
                <p>'</p>

                <h1>Дворец сегодня</h1>
                <p>ОБЛАСТНОЙ ДВОРЕЦ ТВОРЧЕСТВА ДЕТЕЙ И МОЛОДЁЖИ – многопрофильное учреждение инновационного типа, региональный модельный центр дополнительного образования детей Ульяновской области&nbsp;(РМЦ).</p>
                <p>В 2018 году деятельность ОГБОУ ДО ДТДМ осуществлялась по трем направлениям:</p>

                <p>·<span>&nbsp;</span>
                    образовательной;
                </p>

                <p>·<span>&nbsp;</span>
                    информационно-методической;
                </p>

                <p>·<span>&nbsp;</span>
                    досугово-развивающей.
                </p>
                <p>Образовательная деятельность осуществлялась в следующих структурных подразделениях:&nbsp;</p>

                <p>- комплекс технического творчества;</p>

                <p>- естественнонаучный комплекс;</p>

                <p>- комплекс туризма и краеведения;</p>

                <p>- комплекс гуманитарных наук и социальных технологий;</p>

                <p>- спортивно-массовый комплекс.</p>

                По сравнению с 2017 годом численность обучающихся увеличилась на <b>1,4%</b> и составила <b>8938</b> обучающихся в возрасте от 4 лет до 21 года.
                <div><br>
                    <p>Особое внимание уделяется работе с одарёнными детьми и развитию научно-исследовательской деятельности. Для развития одарённости во Дворце сформирована обогащённая образовательная среда, где на пробуждение интеллекта "работает" всё: более 20 специально оборудованных аудиторий, автотренажёрный класс и класс робототехники, лаборатории химии и биологии, физики и высоких технологий, четыре хореографических класса, зрительный, конференц- и спортивный залы, библиотека, типография, студия звукозаписи, фотостудия.</p>
                    <h5>НАШИ ДОСТИЖЕНИЯ</h5>
                    <p>Воспитанники Дворца – победители международных, всероссийских, областных конкурсов и фестивалей.&nbsp;<span style="background-color: initial;">Гордость Дворца – творческие коллективы, имеющие звания "Образцовый детский коллектив" и "Народный самодеятельный коллектив":</span></p><p>– Ансамбль танца "Симбирцит"</p><p>– Ансамбль эстрадного танца "Эксайт"</p><p>– Ансамбль танца "Улыбка"</p><p>– Театр-студия "У Лукоморья"</p><p><span style="background-color: initial;">Более 40 обучающихся Дворца – лауреаты Президентской и Губернаторской премий.</span></p><p></p>
                    <p>НАШИ ПЕДАГОГИ</p>
                    <p>Преподавательский состав имеет высокий педагогический потенциал. </p><p>В 2018 году общая численность педагогических
                        работников в ОГБУ ДО ДТДМ составила <b>257</b>
                        <b>человек</b>, из которых <b>99</b> – основные, <b>158</b> –
                        совместители.&nbsp;</p>

                    <p>Среди основных
                        педагогических работников имеют высшее образование - <b>84,8%,</b> высшую квалификационную категорию - <b>19,2%, </b>первую квалификационную категорию – <b>15,2%, у</b>чёную степень -&nbsp; <b>4</b> сотрудника ОГБУ ДО ДТДМ.</p><p></p><p>В 2018 году Елисеева Г.Г. (комплекс гуманитарных наук
                        и социальных технологий) заняла 2-место в областном&nbsp; конкурсе педагогических работников
                        дополнительного образования Ульяновской области «Признание» в номинации
                        «Педагог дополнительного образования художественной направленности (народные
                        художественные промыслы)». Звание «Народный самодеятельный коллектив»
                        подтвердили «Ансамбль танца «Симбирцит» (руководитель Леонтьева Е.В., педагоги:
                        Халиуллова Э.А., Фомин Е.А., Яковлев А.В.) и «Ансамбль эстрадного танца «Эксайт»
                        (руководитель Гиль И.В., педагог Обидова О.В.). Ансамбль танца «Улыбка»
                        (руководитель Бондарчук О.А.) получил звание «Народный коллектив». Ваганов
                        Александр Сергеевич, заместитель директора по научно-исследовательской
                        деятельности ОГБУ ДО ДТДМ, приказом Министра образования и науки Ульяновской
                        области занесён на Доску почёта «Аллея славы учителей Ульяновской области».</p>
                    <p>МЫ ОРГАНИЗУЕМ И ПРОВОДИМ ДЛЯ ВАС:</p>
                    <p>- региональный конкурс детского самодеятельного творчества "Симбирский Олимп",</p>
                    <p>- региональную телевизионную гуманитарную олимпиаду школьников "Ульяновские умники и умницы",</p>
                    <p>- открытый Межрегиональный конкурс инновационных проектов детей и юношества "Новое поколение" и Всероссийскую интеллектуальную олимпиаду "Наше наследие",</p>
                    <p>- фестиваль научно-технического творчества "Техноград",<span style="background-color: initial;">&nbsp;</span></p>
                    <p>-&nbsp;региональный этап Всероссийского робототехнического Форума дошкольных образовательных организаций «ИКаРёнок»,</p>
                    <p>-&nbsp;региональный этап Всероссийского робототехнического фестиваля «РобоФест»,</p>
                    <p>-&nbsp;Областную дистанционную Интернет-олимпиаду по экологии,</p>
                    <p>и многие другие мероприятия как регионального, так и федерального масштаба.</p>
                    <p><b>Новые формы в образовательной деятельности – детские и молодёжные академии:</b></p>
                    <ul>
                        <li>
                            <p>Молодежная Медиаакадемия<span style="background-color: initial;">&nbsp;</span></p>
                        </li>
                        <li>
                            <p>Детская кулинарная академия "Кухмистер"</p></li>
                        <li><p>Молодежная академия духовности "Вознесение"</p></li>
                        <li><p>Детская академия «Юный железнодорожник»</p></li>
                        <li><p>Детская академия дизайна и стиля</p></li>
                        <li><p>Молодежная педагогическая академия</p></li>
                        <li><p>"Малышковая Академия"<span style="background-color: initial;">&nbsp;</span></p></li>
                        <li><p>Детская академия туризма и краеведения<span style="background-color: initial;">&nbsp;</span></p></li>
                        <li><p>Детская ядерная медицинская академия</p></li>
                        <li><p>&nbsp;Детская медицинская академия</p></li>
                        <li><p>&nbsp;"Архитектурная Академия"</p></li>
                        <li><p>&nbsp;АвтоАкадемия</p></li>
                        <li><p>Молодёжная правовая академия</p></li>
                    </ul>
                    <p>
                        <ul>
                            <li><p>Академия электроники и энергетики</p></li>
                            <li><p>Молодёжная академия транспорта и логистики</p></li>
                        </ul>
                    </p>
                    <p><br></p>

                    <p></p><br><p></p>
                    <p></p>
                </div>
            </div>
        </div>

    </div>

</main>

</footer>

</body>
</html>