@extends('dashboard.layout')

@section('content')
          <div class="section-header">
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ url('home')}}">Dashboard</a></div>
                <div class="breadcrumb-item">Konsumen</div>
                <div class="breadcrumb-item">Laporan Konsumen</div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                     <h4>Laporan Konsumen</h4>
                    </div>

                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="label">Tanggal Awal</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="tglawal" name="tglawal">
                              </div>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="label">Tanggal Akhir</label>
                              <div class="input-group">
                                <input type="date" class="form-control" id="tglakhir" name="tglakhir" >
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <a href="#" onclick="this.href='konsumen/cetak/'+ document.getElementById('tglawal')
                          .value + '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary ml-3"><i class="fas fa-print"></i> Cetak</a>                      
                        </div>

                    
                      </div>
                    </div>
                </div>
            </div>
          </div>
        
@stop