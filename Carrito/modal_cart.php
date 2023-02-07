<!-- MODAL CARRITO -->


<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
		
		<div class="row justify-content">
		<a type="button"    class="btn btn-warning "  href="Carrito/borrarcarro.php" ><i class="fa fa-trash"></i> Vaciar carrito</a>
		</div>
      </div>
      <div class="modal-body">
			<div class="modal-body">
				<div>
					<div class="p-2">
						<ul class="list-group ">
							<?php
                            
							if(isset($_SESSION['carrito'])){
                            $carrito_mio=$_SESSION['carrito'];
							$total=0;
							for($i=0;$i<=count($carrito_mio)-1;$i ++){
							if($carrito_mio[$i]!=NULL){
						
                           ?>
							<li class="list-group-item d-flex justify-content-between lh-condensed">
									<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Producto: <?php  echo $carrito_mio[$i]['producto']; ?>  </h6>
									</div>
									<div class="col-6 p-0"  style="text-align: right; color: #000000;" > 
									<span   style="text-align: right; color: #000000;">Cantidad: <?php  echo $carrito_mio[$i]['cantidad'] ?>   </span>
									<span   >S/. <?php    echo number_format(($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']),2,",",".");    ?>  </span>
									</div>
							</li>
							<?php
							$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
							}
							}
							}
							?>
							<li class="list-group-item d-flex justify-content-between ">
							<div class="col-6 p-0" style="text-align: left; color: #000000;">
							<h6 class="my-0">Total  </h6>
									</div>
							<div  style=" color: #000000;" > 
										<span  style="float: right; color: #000000;"> S/. <?php
										if(isset($_SESSION['carrito'])){
										$total=0;
										for($i=0;$i<=count($carrito_mio)-1;$i ++){
										if($carrito_mio[$i]['txtID']!=NULL){ 
										$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
										}}}
										if(isset($total)){
										echo number_format(($total),2,",",".");
										}else{
										echo "0,00"; 
										}?> 
										</span>
							</div>		
							</li>
						</ul>
					</div>
				</div>
			</div>
			


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		<a type="button" class="btn btn-primary" href="MedioEnvio/Medio_Envio.php">Continuar pedido</a>
        
	</div>
    </div>
  </div>
</div>
<!-- END MODAL CARRITO -->