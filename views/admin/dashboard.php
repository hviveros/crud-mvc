<div class="container-fluid dashboard">
  <div class="row">
      <?php require_once 'navbar.php'; ?>

      <div id="main" class="p-0 container-fluid main">
        <header class="pr-3 pl-3 pr-md-3 pl-md-3 pr-lg-5 pl-lg-5 d-flex justify-content-end align-items-center header">
          <div class="w-100 text-sm-left text-md-center">
            <h1 class="m-0 d-lg-none side__nav--title"><?php echo NOMBRE_BLOG; ?></h1>
          </div>
          <div class="btn-group container__user">
            <button type="button" class="p-0 d-flex align-items-center position-relative container__user--btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <p class="m-0 mr-4 username">Usuario</p>
              <span class="arrow--left" ></span>
                <i class="fas fa-angle-down username--arrow" id="dropdownMenuButton"></i>
              </span>
            </button>
            <!--<div class="dropdown-menu dropdown-menu-right">
              <a href="#" class="dropdown-item">User</a>
              <a href="#" class="dropdown-item">User</a>
            </div>-->
          </div>


          </header>
          <div class="p-4 p-lg-5  main__container">
              <div class="row m-0 mb-5">
                  <h2>Dashboard</h2>
              </div>
              <div class="row m-0">
                  <div class="mr-5 col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 card__stats">
                      <p class="card__stats--name">Usuarios</p>
                      <span class="card__stats--amount">100</span>
                  </div>

                  <div class="mr-5 col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 card__stats">
                      <p class="card__stats--name">Usuarios</p>
                      <span class="card__stats--amount">100</span>
                  </div>

                  <div class="mr-5 col-12 col-sm-3 col-md-3 col-lg-2 col-xl-2 card__stats">
                      <p class="card__stats--name">Usuarios</p>
                      <span class="card__stats--amount">100</span>
                  </div>

              </div>
              <div class="row">
                  <div class="pt-4 col-12 col-xl-6 last__publications">
                      <h3 class="table--title">Últimos registros</h3>
                      <table class="table">
                          <thead class="t-head">
                              <tr>
                              <th scope="col">Título</th>
                              <th scope="col">Comentarios</th>
                              <th scope="col">Acciones</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>@mdo</td>

                              </tr>

                              <tr>
                              <td>Thornton</td>
                              <td>@fat</td>
                              <td>@fat</td>

                              </tr>

                              <tr>
                              <td>the Bird</td>
                              <td>@twitter</td>
                              <td>@twitter</td>

                              </tr>
                          </tbody>
                      </table>
                  </div>

                  <div class="pt-4 col-12 col-xl-6 last__registers">
                      <h3 class="table--title">Últimos registros</h3>
                      <table class="table">
                          <thead class="t-head">
                              <tr>
                              <th scope="col">Título</th>
                              <th scope="col">Comentarios</th>

                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                              <td>Otto</td>
                              <td>@mdo</td>
                              </tr>

                              <tr>
                              <td>Thornton</td>
                              <td>@fat</td>
                              </tr>

                              <tr>
                              <td>the Bird</td>
                              <td>@twitter</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>

      </div>
    </div>
  </div>
</div>
