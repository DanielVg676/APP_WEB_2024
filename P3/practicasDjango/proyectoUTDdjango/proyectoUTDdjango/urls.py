from django.contrib import admin
from django.urls import path, include
from django.conf import settings
from django.conf.urls import handler404
from mainapp import views as main_views

# Vista personalizada para manejar errores 404
handler404 = 'mainapp.views.page404'

urlpatterns = [
    path('admin/', admin.site.urls),  # Agregar la barra inclinada
    path('', include('mainapp.urls')),  # Ruta para mainapp
    path('articulos/', include('articulos.urls')),  # Ruta separada para articulos
]

if settings.DEBUG:
    from django.conf.urls.static import static
    urlpatterns += static(settings.MEDIA_URL, document_root=settings.MEDIA_ROOT)
