<div class="modal fade" id="TextModal{{$i->id}}" tabindex="-1" aria-labelledby="TextModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#344474 !important;">
                <h5 class="modal-title text-center text-white" id="TextModalLabel" style="margin: 0 auto;">Coordinación de Lenguas Extranjeras</h5>
                <!--<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                <div class="container p-3" style="font-size:11pt">
                    {!!$i->descripcion!!}
                </div>
            </div>
            <div class="modal-footer" style="background-color:#344474 !important;">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
