
{% set homeActive = "" %}
{% set bookActive = "" %}
{% set authorActive = "" %}
{% set contactActive = "" %}
{% set profilActive = "" %}
{% set subscribeActive = "" %}
{% set loginActive = "" %}

{% if 'home' in app.request.pathinfo or 'accueil' in app.request.pathinfo %}
    {% set homeActive = "active" %}
    {% elseif 'livres' in app.request.pathinfo %}
    {% set bookActive = "active" %}
    {% elseif 'auteurs' in app.request.pathinfo %}
    {% set authorActive = "active" %}
    {% elseif 'contact' in app.request.pathinfo %}
    {% set contactActive = "active" %}
    {% elseif 'profil' in app.request.pathinfo %}
    {% set profilActive = "active" %}
    {% elseif 'register' in app.request.pathinfo %}
    {% set subscribeActive = "active" %}
    {% elseif 'login' in app.request.pathinfo %}
    {% set loginActive = "active" %}
{% else %}
    {% set homeActive = "active" %}
{% endif %}




<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            {% block title %}
                Welcome!
            {% endblock %}
            </title>

        <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>">

        <!-- CSS only (bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> 
        
        {% block stylesheets %}
            <style>
                section {
                    border: 1px solid grey;
                }
                .btn {
                    border-radius:0;
                    border:none;
                }
            </style>
        {% endblock %}

        <!-- CSS (toujours après la feuille de style bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
        <link rel="stylesheet" href="{{asset("css/styles.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/all.min.css")}}">

    </head>
    <body>

        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{path('app_front_home')}}">
                    LA LIBRAIRIE
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav w-100 align-items-center">
                        <li class="nav-item">
                            <a class="nav-link {{homeActive}}" aria-current="page" href="{{path('app_front_home')}}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{bookActive}}" href="{{path('app_front_book')}}">
                                Nos livres
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{authorActive}}" href="{{path('app_front_author')}}">
                                Nos auteurs
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link {{contactActive}}" href="/">
                            Contact
                        </a>
                    </li>


                        <li class="nav-item ms-auto">
                            {% if is_granted("ROLE_USER") %}
                                <div class="d-flex align-items-center">
                                    <div class="text-white">Bienvenue 
                                        {% if app.user.avatar is not null%}
                                            <img src="{{asset('images/avatar/' ~ app.user.avatar.imageName)|imagine_filter('my_thumb')}}" alt=""> 
                                        {% else %}
                                            <img src="{{asset('images/avatar/default.jpg')|imagine_filter('my_thumb')}}" alt="default.jpg"> 
                                        {% endif %}
                                    </div>
                                    {% if is_granted("ROLE_ADMIN") %}
                                    <a class="nav-link mx-2" href="{{path('app_admin')}}" target="_blank" >Admin</a>
                                    {% endif %}
                                    <a class="nav-link {{profilActive}}" href="{{path('app_front_profil')}}">Mon compte</a>
                                    <a class="nav-link" href="{{path('app_logout', {'verified':true})}}">Déconnexion</a>
                                </div>
                                {% else %}
                                    <div class="d-flex align-items-center">
                                        <a class="nav-link {{subscribeActive}} me-1" href="{{path('app_register')}}">Inscription</a>
                                        <a class="nav-link {{loginActive}}" href="{{path('app_login')}}">Connexion</a>
                                    </div>
                                {% endif %}
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container bg-white shadow py-3">
            {% for label, messages in app.flashes %}
                {% for message in messages %}
                    <div class="alert alert-{{ label }} alert-dismissible fade show" role="alert">
                    {{ message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                {% endfor %}
            {% endfor %}
            
            {% block body %}{% endblock %}

        </main>


        <!-- JavaScript Bundle with Popper (bootstrap)-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="{{ asset('js/lightbox.min.js') }}"></script>
        <script src="{{ asset('js/favorite.js') }}"></script>

        {% block javascripts %}
            {{ encore_entry_script_tags('app') }}
        {% endblock %}
    </body>
</html>
