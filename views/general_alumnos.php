    <?php include 'includes/header.php'; ?>
    <!--jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

	<!-- DataTables CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

	<!--DataTables Responsive CSS-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

	<!--DataTbles JS-->
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

	<!-- DataTables Responsive JS -->
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
	<div class="container mt-5">
		<h2>Total General de Alumnos</h2>
		<table id="tablaAlumnos" class="table table-striped table-bordered dt-responsive nowrap" style="width: 100%">
			<thead class="bg-dark text-white text-center">
				<tr>
					<th>No</th>
					<th>Matrícula</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Grupo</th>
					<th>Cuatrimestre</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php
					//Configuracion de la BD
					include_once("config.php");

					//Consulta a la base de datos
					$query = "SELECT id_alumnos, matricula, nombre, email, grupo, cuatrimestre FROM alumnos";
					$result = $conn->query($query);

					if ($result && $result->num_rows > 0) {
						//Mostrar los datos de cada fila
						while($row = $result->fetch_assoc()){
							echo "<tr>
							<td>{$row['id_alumnos']}</td>
							<td>{$row['matricula']}</td>
							<td>{$row['nombre']}</td>
							<td>{$row['email']}</td>
							<td>{$row['grupo']}</td>
							<td>{$row['cuatrimestre']}</td>
							</tr>";
						}
					} else {
						echo "<tr><td colspan='6'>No se encontraron registros</td></tr>";
					}

					//Cerrar la conexion
					$conn->close();
				?>
			</tbody>
		</table>
	</div>
	<div class="p-3">
	</div>

	<!-- El siguiente fragmento utiliza jQuery y el plugin DataTables para dinamizar una tabla HTML dándole funcionalidades avanzadas. -->
	<script>
		//Espera a que el documento se haya cargado completamente antes de ejecutar el código.
		$(document).ready(function() {
			//Inicializa DataTables en la tabla con el ID 'tablaAlumnos'.
			$('#tablaAlumnos').DataTable({
				//Habilita el diseño responsivo de DataTables. Esto hace que la tabla sea adaptativa a diferentes tamaños de pantalla.
				responsive: true,
				//Personaliza el idioma de los elementos de DataTables para mejorar la experiencia del usuario en español.
				"language": {
					//Cambia el texto del elemeto de búsqueda y añade un placeholder al campo de búsqueda.
					"search": "Buscar",
					"searchPlaceholder": "Filtrar por columna...",
				}
			});
		});
	</script>
		
	<!-- Popper .js first, then Bootstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
	
</body>
</html>