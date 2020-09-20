<?php 

namespace Libraries\Services;

class Complement
{
    public function datatable($options, $cssClass){
        /*
         *
         * EXAMPLE
         * -------
         *
         * $opciones = array(
         *      'bPaginate' => FALSE,
         *      'bFilter' => TRUE,
         *      'bLengthChange' => FALSE,
         *      'bInfo' => FALSE
         * );
         *
         */
        $data = array(
            'bAutoWidth' => FALSE,
            'oLanguage' => array(
            	'sSearch' => 'Buscar',
            	'sProcessing' =>     "Procesando...",
            	'sLengthMenu'=>     "Mostrar _MENU_ registros",
                'sEmptyTable' => 'No hay registros disponibles',
                'sInfo' => 'Hay _TOTAL_ registros. Mostrando del _START_ al _END_',
                'sLoadingRecords' => 'Por favor espere. Cargando...',
                'sInfoEmpty' =>      'Mostrando registros del 0 al 0 de un total de 0 registros',
            	'sInfoFiltered' =>   '(filtrado de un total de _MAX_ registros)',
                'sLengthMenu' => ''
                    . '<select class="form-control selectpicker">'
                    . '<option value="5">Mostrar [5] registros</option>'
                    . '<option value="10">Mostrar [10] registros</option>'
                    . '<option value="20">Mostrar [20] registros</option>'
                    . '<option value="50">Mostrar [50] registros</option>'
                    . '<option value="100">Mostrar [100] registros</option>'
                    . '<option value="-1">Todos los registros</option>'
                    . '</select>',
                'oPaginate' => array(
                    'sLast' => 'Última página',
                    'sFirst' => 'Primera',
                    'sNext' => 'Siguiente',
                    'sPrevious' => 'Anterior'
                ),
                'oAria' => array(
                    'sSortAscending' =>  ': Activar para ordenar la columna de manera ascendente',
                	'sSortDescending' => ': Activar para ordenar la columna de manera descendente'
                )
            )
        );
        $generateData = array_merge($options, $data);
        $result = array(
            'jquery' => json_encode($generateData, JSON_NUMERIC_CHECK),
            'clases' => $cssClass
        );
        return $result;
    }
}