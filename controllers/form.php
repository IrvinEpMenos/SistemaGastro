<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR ARTICULO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        /*Estilo para la vista previa de la imagen */
        .imagen-preview{
            width: 200px;/*ANCHO */
            height: 200px;/*alto */
            border: 2px dashed #dddddd;
            display:flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: #cccccc;
            margin-top: 15px;
            overflow: hidden;/*ocultar cualquier parye de la imagen que exceda ek tam;ano del contenedor */
        }
        .imagen-preview img{
            display:none;
            width:100%;
            height:100%;
            object-fit: cover;/*ASEGURA QUE LA IMAGEN CUBRA COMPLETAMENTE EL CONTENIDO SIN PERDE SUS PROPORCIONES */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Agregar articulo</h2>
        <form action="agregar_articulo.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombreArticulo">Nombre del articulo</label>
                        <input type="text" class="form-control" id="nombreArticulo" name="nombreArticulo" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidadExistente">Cantidad</label>
                        <input type="number" class="form-control" id="cantidadExistente" name="cantidadExistente" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="rutaImagen">Carga imagen</label>
                            <label class="small">(admite solo .png, .jpeg y jpg)</label>
                            <input type="file" class="form-control-file" id="rutaImagen" name="rutaImagen" accept="image/ png, image/jpeg">
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <img src="" alt="Vista previa a la imagen" id="previewImg">
                        <span id="previewText">Vista previa de la imagen</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">agregar</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        //javascript para manejar la vista previa de la imagen
        document.getElementById("rutaImagen").addEventListener("change", function(){
            const reader = new fileReader();
            reader.onload =function(e){
                const uploaded_imagen = e.target.result;
                document.getElementById("previewImg").src = uploaded_image;
                document.getElementById("previewImg").style.display = "block";
                document.getElementById("previewImg").style.display = "none";//ocultar el texto una vez que se carga la imagen

        };
        reader.readAsDataURL(this.files[0]);

    });
    </script>
</body>
</html>