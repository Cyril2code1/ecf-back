<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h2>TRT-conseil</h2></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <?php if (isset($_SESSION['role'])): ?>
              <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="./index.php?section=home&action=logout">logout</a>
              </li>
                  <?php else:   
                    if (isset($_GET['action']) && $_GET['action'] === 'signup'): ?>          
                      <li class="nav-item">
                        <a class="nav-link btn btn-danger text-white" href="./index.php">accueil</a>
                      </li>
                          <?php else: ?>
                            <li class="nav-item">
                              <a class="nav-link btn btn-success text-white" href="./index.php?action=signup">s'inscrire</a>
                            </li>
                    <?php endif; 
        endif; ?>
      </ul>
    </div>
  </div>
</nav>