from django.shortcuts import render
from django.contrib.auth.decorators import login_required
from articulos.models import Category, Article


# Create your views here.
@login_required(login_url='inicio')
def list_art(request):
    #sacar los articulos de la BD
    articles = Article.objects.all()
    return render(request,'articulos/listado_art.html',{
        'title':'Articulos',
        'content': 'Listado de Articulos',
        'articles': articles 

    })


@login_required(login_url='inicio')

def list_cat(request):
    categories = Category.objects.all()
    return render(request,'categorias/listado_cat.html',{
        'title':'categorias',
        'content':'listadode categorias',
        'categories' : categories
    })
