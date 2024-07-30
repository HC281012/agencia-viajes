<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Vuelos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(event) {
                event.preventDefault(); // Evitar que el formulario se envíe de forma tradicional

                $.ajax({
                    url: 'busqueda.php',
                    type: 'GET',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#results').html(response);
                    },
                    error: function() {
                        $('#results').html('<p>Error al buscar vuelos.</p>');
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Buscar Vuelos</h1>
    <form id="searchForm" method="get">
        <label for="origin">Ciudad de origen (código IATA):</label>
        <input type="text" id="origin" name="origin" value="SCL" required>
        <br>
        <label for="destination">Ciudad de destino (código IATA):</label>
        <input type="text" id="destination" name="destination" value="JFK" required>
        <br>
        <label for="departureDate">Fecha de salida (YYYY-MM-DD):</label>
        <input type="date" id="departureDate" name="departureDate" value="2024-08-15" required>
        <br>
        <label for="returnDate">Fecha de regreso (YYYY-MM-DD):</label>
        <input type="date" id="returnDate" name="returnDate" value="2024-08-22">
        <br>
        <label for="adults">Número de adultos:</label>
        <input type="number" id="adults" name="adults" value="1" min="1" required>
        <br>
        <button type="submit">Buscar Vuelos</button>
    </form>
    
    <div id="results">
        <!-- Los resultados de la búsqueda se mostrarán aquí -->
    </div>
</body>
</html>
