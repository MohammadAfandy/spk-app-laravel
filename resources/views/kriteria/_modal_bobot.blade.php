<!-- Modal -->
<div id="modal-bobot" class="modal fade" role="dialog">
    <div class="modal-dialog">
        {!! Form::open(['route' => 'kriteria.setBobot', 'id' => 'form-set-bobot']) !!}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SET BOBOT</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger error-message" style="display: none;"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Kriteria</th>
                            <th>Tipe</th>
                            <th>Bobot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                            <tr>
                                <td>{!! $kriteria->nama !!}</td>
                                <td>{!! $kriteria->tipe !!}</td>
                                <td>
                                    {!! Form::text('bobot[' . $kriteria->id . ']', $kriteria->bobot) !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <div class="col-sm-offset-10">
                    {!! Form::submit('Set', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>