<!-- Modal -->
<div id="modal-sub-kriteria" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::open(['route' => 'subKriteria.store', 'id' => 'form-sub-kriteria']) !!}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SET SUB KRITERIA</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <div class="col-sm-offset-10">
                    {!! Form::submit('Set', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>