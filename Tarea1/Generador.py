# Generador de contraseñas, Walter Chamorro

import random

longitud = 15
contrasena = ''

def validar(cadena, caracter):
    for i, caracter_actual in enumerate(cadena):
        if caracter_actual == caracter:
            return False
    return True

while len(contrasena) < longitud:
    numero_azar = random.randrange(33, 125)
    caracter = chr(numero_azar)
    if validar(contrasena, caracter):
         contrasena += caracter
         
print('Su contraseña de {} caracteres es: {}'.format(len(contrasena), contrasena))
