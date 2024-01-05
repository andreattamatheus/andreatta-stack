
@extends('layouts.site-layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>URL Shortener</h1>

            </div>
        </div>
        <div class="card  col-6">
            <div class="card-body">
                <h3>Make the life shorter, or not:</h3>
                <form role="form" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Type the full url</label>
                    <input type="email" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary w-100 my-4 mb-2">Shortly</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card my-4">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                  <h6 class="text-white text-capitalize ps-3">Links Overview</h6>
                </div>
              </div>
              <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Original link</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Shortener</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th class="text-secondary opacity-7"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">John Michael</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Manager</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success">Online</span>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0">
                              <i class="fa fa-trash text-xs"></i>
                            </button>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">John Michael</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0">Programator</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-link text-secondary mb-0">
                              <i class="fa fa-trash text-xs"></i>
                            </button>
                        </td>
                      </tr>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
