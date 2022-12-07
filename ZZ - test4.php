<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{% block title %}Nani{% endblock %}</title>

        <link rel="icon" href="{{asset("images/logo-NANI.svg")}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        {% block stylesheets %}
        {% endblock %}

        <link rel="stylesheet" href="{{asset("css/styles.min.css")}}">
    </head>

    
    <body>
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{path ("app_front")}}" title="Accueil">
                    <img src="{{asset("images/logo-NANI.svg")}}" alt="logo NANI" width="30" height="30" class="d-inline-block align-text-center">
                    NANI
                </a>

                <div class="d-flex flex-wrap align-items-center">
                    {% if is_granted("ROLE_USER")%}
                        <div class="text-dark">
                            Bienvenue&nbsp; 
                            {% if app.user.name is not null%}
                                {{ app.user.name }}
                                {% endif %}
                        </div>

                        {% if is_granted("ROLE_ADMIN") %}
                            <a class="nav-link mx-2" href="{{path ("app_admin", {"verified":true})}}" class="text-decoration-none mx-1" target="_blank" title="Paramètres Administrateur">
                                <i class="bi bi-gear-fill"></i>
                            </a>
                            {% elseif is_granted("ROLE_NURSERY") %}
                                <a class="nav-link mx-2" href="#" target="_blank" title="Espace de la crèche"><i class="bi bi-gear-fill"></i>
                            </a>
                        {% endif %}

                        <a href="{{path ("app_logout", {"verified":true})}}" class="text-decoration-none mx-5" title="Déconnexion">
                            <i class="bi bi-x-circle-fill text-danger"></i>
                        </a>


                    {% else %}

                        <a href="{{path ("app_register")}}" class="text-decoration-none mx-3" title="Inscription">
                            <button type="button" class="btn btn-success" title="Inscription">
                                <i class="bi bi-person-plus"></i>
                                Inscription
                            </button>
                        </a>

                        <a href="#" class="text-decoration-none mx-1" title="Informations">
                            <i class="bi bi-info-circle"></i>
                        </a>

                        <a href="{{path ("app_login")}}" class="text-decoration-none mx-1" title="Connexion">
                            <i class="bi bi-person"></i>
                        </a>
                    {% endif %}
                </div>
            </div>
        </nav>


        <main class="container shadow py-3 rounded-bottom">

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
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        {% block javascripts %}
            {{ encore_entry_script_tags('app') }}
        {% endblock %}
    </body>
</html>
