<?php
// Obtener datos del formulario
$origin = htmlspecialchars($_GET['origin']);
$destination = htmlspecialchars($_GET['destination']);
$departureDate = htmlspecialchars($_GET['departureDate']);
$returnDate = htmlspecialchars($_GET['returnDate']);
$adults = htmlspecialchars($_GET['adults']);

// Datos estáticos de vuelos simulados
$flights = [
    [
        'origin' => 'SCL',
        'destination' => 'JFK',
        'departureDate' => '2024-08-15',
        'returnDate' => '2024-08-22',
        'price' => 800,
        'direct' => true
    ],
    [
        'origin' => 'SCL',
        'destination' => 'LAX',
        'departureDate' => '2024-08-15',
        'returnDate' => '2024-08-22',
        'price' => 700,
        'direct' => false
    ],
    [
        'origin' => 'SCL',
        'destination' => 'JFK',
        'departureDate' => '2024-08-15',
        'returnDate' => '2024-08-22',
        'price' => 750,
        'direct' => true
    ]
];

// Filtrar vuelos basados en los criterios
$filteredFlights = array_filter($flights, function($flight) use ($origin, $destination, $departureDate, $returnDate) {
    return $flight['origin'] === $origin &&
           $flight['destination'] === $destination &&
           $flight['departureDate'] === $departureDate &&
           $flight['returnDate'] === $returnDate;
});

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de la Búsqueda</title>
</head>
<body>
    <h1>Resultados de la búsqueda</h1>
    
    <?php if (count($filteredFlights) > 0): ?>
        <?php foreach ($filteredFlights as $flight): ?>
            <div>
                <p>Origen: <?php echo htmlspecialchars($flight['origin']); ?></p>
                <p>Destino: <?php echo htmlspecialchars($flight['destination']); ?></p>
                <p>Fecha de salida: <?php echo htmlspecialchars($flight['departureDate']); ?></p>
                <p>Fecha de regreso: <?php echo htmlspecialchars($flight['returnDate']); ?></p>
                <p>Precio: $<?php echo htmlspecialchars($flight['price']); ?></p>
                <p>Directo: <?php echo $flight['direct'] ? 'Sí' : 'No'; ?></p>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No se encontraron vuelos.</p>
    <?php endif; ?>
    
</body>
</html>
