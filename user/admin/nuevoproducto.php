<div class="panel panel-inverse" data-sortable-id="form-stuff-3">
    <div class="panel-heading">
        <h3 class="panel-title">Nuevo Producto</h3>
    </div>
   
    <div class="panel-body">
<form action="" method="POST" id="productonuevo">
            <fieldset>
                <legend>Datos del Producto</legend>
                <div class="col-md-3">
                 
                   <div class="form-group">
                    <label > Nombre Producto</label>
                    <input type="text" class="form-control" id="nameproducto" placeholder="producto a ingresar"  required/>
                   </div>

                   <div class="form-group">           
                    <label >Partida</label>
                    <input type="text" class="form-control" id="partida" placeholder="#partida" required />        
                        </div>
                 
               </div>               
<div class="row">

              <div class="col-sm-3">

              <div class="form-group" >

                    <label >Estado</label>
                       <form action="">
 						 <select name="estado" id="estado">
   						 <option value="nuevo">nuevo</option>
   					     <option value="usado">usado</option>
  						 </select>
							</form>
                                       
                </div>
 
</div> 
             </div>

              <div class="col-sm-3">
              
                  <div class="form-group">           
                    <label >Precio $</label>
                    <input type="text" class="form-control" id="precio" placeholder="ej. 20.16" required />        
                        </div>
                    <button type="submit" class="btn btn-sm btn-success m-r-5">Agregar Producto</button>
                <!--<button type="submit" class="btn btn-sm btn-default">Cancel</button>--> 

                               </div>
               
                </div>
                
            </fieldset>
        </form>
    </div>

<script src="../../assets/js/admin.js"></script>
    </div>
</div>
