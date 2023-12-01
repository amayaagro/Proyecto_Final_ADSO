<!-- Footer -->
<p></p>
    <link rel="stylesheet" href="http://localhost/kahwa/Css/Styles.css" />
    <!-- Bootstrap JavaScript Libraries -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js">
    </script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js">
    </script>
    <script>
        new DataTable('#tabla_id', {
            responsive: true,
            autowidth: false,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "Nada encontrado - disculpa",
                "info": "Mostrando la página _PAGE_ de _PAGES_",
                "infoEmpty": "Ningún registro",
                "infoFiltered": "(Filtraodo de _MAX_ registros totales)",
                "search":"Buscar:",
                'paginate': {
                    'next':'Siguiente',
                    'previous':'Anterior'   
            }
        }
        });
    </script>

    <!-- Funcion Estado -->
    <script>
    function borrar(id)
    {         
        Swal.fire({
        title: '¿Desea cambiar el estado del registro?',
        showCancelButton: true,
        confirmButtonText: 'Si'
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        window.location="index.php?txtID="+id;
        }
        })
    }
    </script>