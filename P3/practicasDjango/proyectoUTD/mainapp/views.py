from django.shortcuts import render

# Create your views here.

def index(request):
    mensaje = 'Hola soy un mensaje'
    return render(request, 'mainapp/index.html',{
        'title': 'Inicio',
        'content': 'Bienvenido a la pagina principal',
        'mensaje': 'Hola soy un mensaje'
    })

def about(request):
    mensaje = 'Hola soy un mensaje'
    return render(request, 'mainapp/about.html',{
        'title': 'Sobre nosotros',
        'content': 'Somos un equipo de Desarrollo de SW',
        'mensaje': 'mensaje'
    })

def mision(request):
    mensaje = 'Hola soy un mensaje'
    return render(request, 'mainapp/mision.html',{
        'title': 'Nuestra Mision',
        'content': 'Nuestra mision es tener profesionistas de primera calidad',
        'mensaje': 'mensaje'
    })


def vision(request):
    mensaje = 'Hola soy un mensaje'
    return render(request, 'mainapp/vision.html',{
        'title': 'Nuetsra Vision',
        'content': 'Nuestra vision es ver por un futuro con mejores profesionisras',
        'mensaje': 'mensaje'
    })