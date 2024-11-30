from django.urls import path
from . import views  

urlpatterns = [
    path('', views.index, name='inicio'),
    path('inicio/', views.index, name='inicio'),
    path('about/', views.about, name='acercade'),
    path('mision/', views.mision, name='nuestramision'),
    path('vision/', views.vision, name='nuestravision'),
    path('registro/', views.registro, name='registro'),
    path('login/', views.login_user, name='login'),
    path('logout/', views.logout_user, name='logout'),
]
