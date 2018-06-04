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

$sql = "SELECT id, nombre FROM " . BC_TABLE;
$result = $this->db->get_results( $sql );

?>

<!-- Modal Structure -->
<div id="addUpdate" class="modal">
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
            <div class="input-field col s6">
                <input type="text" id="nombres" class="validate">
                <label for="nombres">Nombres</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
                    <input type="text" id="apellido" class="validate">
                    <label for="apellido">Apellido</label>
            </div>        
        </div>
        <div class="row">
            <div class="input-field col s6">
                    <input type="text" id="email" class="validate">
                    <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="file-field input-field col s6">
                <div class="btn" id="selectimg">
                    <span>
                        Photo
                        <i class="material-icons right">file_upload</i>
                    </span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input id="selectimgval" class="file-path validate" type="text">
                </div>
            </div>
            <div class="col s2">
                <div class="marcoimg">
                    <img src="/wp-content/uploads/2018/06/Arizona.jpg" alt="">
                </div>
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
            <a href="?page=bc_data" class="btn btn-floating waves-effect waves-light blue"><i class="material-icons">arrow_back</i></a>
            <a class="addItem btn btn-floating waves-effect waves-light green pulse"><i class="material-icons">add</i></a>
            <span>Add a new user</span>
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
                <?php 
                    foreach($result as $k => $v ){
                        $id     = $v->id;
                        $nombre = $v->nombre;
                        echo "
                        
                        <tr  data-table='$id'>
                            <td>$nombre</td>
                            <td>[meaqs id='$id']</td>
                            <td>
                                <span data-bc-id-edit='$id' class='btn btn-floating waves-effect waves-light'>
                                    <i class='tiny material-icons'>mode_edit</i>
                                </span>
                            </td>
                            <td> 
                                <span data-bc-id-remove='$id' class='btn btn-floating waves-effect waves-light red darken-1'>
                                    <i class='tiny material-icons'>close</i>
                                </span>
                            </td>
                        </tr>

                        ";
                    }
                ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>