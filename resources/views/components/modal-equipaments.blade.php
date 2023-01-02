<div class="modal fade" id="m-equipaments-{{$userId}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> {{ $userName }} | Equipamentos vinculados </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach($equipaments as $keyEquipament => $equipament)
                <?php $type = $equipament->getEquipamentType(); ?>
                    <strong> {{$keyEquipament+1}}) </strong> {{$type->name}}
                    
                    <div class="row ml-4">
                        <div class="col-md-6">
                            <strong>Apelido:</strong> {{ $equipament->name }} <br>
                            <strong>Código de identificação:</strong> {{ $equipament->identification_code }} <br>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>