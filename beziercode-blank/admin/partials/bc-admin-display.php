<?php

/**
  * Proporcionar una vista de área de administración para el plugin
  *
  * Este archivo se utiliza para marcar los aspectos de administración del plugin.
  *
  * @link http://misitioweb.com
  * @since desde 1.0.0
  *
  * @package Beziercode_blank
  * @subpackage Beziercode_blank/admin/parcials
  */

?>

<!-- Modal Structure -->
<div id="add_bc_table" class="modal">
    <div class="modal-content">

        <div class="precargador">
            <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
                </div><div class="circle-clipper right">
                <div class="circle"></div>
                </div>
            </div>
            </div>
        </div>

      <form method="post" class="col s12">

        <div class="row">
            <div class="input-field col s4">
                <input type="text" id="nombre-tabla" class="validate">
                <label for="nombre">Nombre</label>
            </div>
        </div>

        <div class="row">
            <div class="col s2">
                <button id="crear-tabla" class="btn waves-effect waves-ligth" type="button" name="action">Crear <i class="material-icons right">add</i></button>
            </div>
        </div>

      </form>
    </div>
</div>
          

<div classs="had-container">
    <div class="row">
        <div class="col s12">
            <h5><?php echo esc_html(get_admin_page_title() ); ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <a class="add-bc-table btn btn-floating pulse"><i class="material-icons">add</i></a>
            <span>Crear nueva tabla de datos</span>
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <table class="responsive-table bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Shortcode</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td>mi primera table</td>
                    <td>[meaqs]</td>
                    <td>
                        <span class="btn btn-floating waves-effect waves-light">
                            <i class="tiny material-icons">mode_edit</i>
                        </span>
                    </td>
                    <td> 
                        <span class="btn btn-floating waves-effect waves-light red darken-1">
                            <i class="tiny material-icons">close</i>
                        </span>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>