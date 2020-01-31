<?php
require_once('../controladores/EstudianteCtrl.php');
require_once('../controladores/CursoCtrl.php');
session_start();
if (!isset($_SESSION['idEstudiante'])) {
  header("Location: ../index.php");
}
$estudianteCtrl = new EstudianteCtrl();
$cursoCtrl = new CursoCtrl();

include 'inc/templates/header.php';
?>

<!-- HEADER -->
<header class="py-2 container fw-200">
  <h1> <i class="fas fa-cog"></i> Dashboard</h1>
</header>

<!-- TOTAL DE ESTUDIANTES Y CURSOS -->
<section>
  <div class="py-4 container">
    <div class="row">
      <div class="col-md-6">
        <div class="card text-center bg-info text-white mb-3">
          <div class="card-body">
            <h3>Cursos</h3>
            <h4 class="display-8">
              <i class="fas fa-pencil-alt"></i> <?php echo $cursoCtrl->getTotalCursos(); ?>
            </h4>
            <a href="posts.html" class="btn btn-outline-light btn-sm">Consultar</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card text-center bg-success text-white mb-3">
          <div class="card-body">
            <h3>Estudiantes</h3>
            <h4 class="display-8">
              <i class="fas fa-folder"></i> <?php echo $estudianteCtrl->getTotalEstudiantes(); ?>
            </h4>
            <a href="categories.html" class="btn btn-outline-light btn-sm">Consultar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ACTIONS -->
<section id="actions" class="py-4 mb-4 bg-light">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
          <i class="fas fa-plus"></i> Add Post
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
          <i class="fas fa-plus"></i> Add Category
        </a>
      </div>
      <div class="col-md-3">
        <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
          <i class="fas fa-plus"></i> Add User
        </a>
      </div>
    </div>
  </div>
</section>

<!-- POSTS -->
<section id="posts">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Latest Posts</h4>
          </div>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th class="dn-small">Title</th>
                <th>Category</th>
                <th class="dn-small">Date</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td class="dn-small">Post One</td>
                <td>Web Development</td>
                <td class="dn-small">May 10 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td class="dn-small">Post Two</td>
                <td>Tech Gadgets</td>
                <td class="dn-small">May 11 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
              <tr>
                <td>3</td>
                <td class="dn-small">Post Three</td>
                <td>Web Development</td>
                <td class="dn-small">May 13 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
              <tr>
                <td>4</td>
                <td class="dn-small">Post Four</td>
                <td>Business</td>
                <td class="dn-small">May 15 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
              <tr>
                <td>5</td>
                <td class="dn-small">Post Five</td>
                <td>Web Development</td>
                <td class="dn-small">May 17 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
              <tr>
                <td>6</td>
                <td class="dn-small">Post Six</td>
                <td>Health & Wellness</td>
                <td class="dn-small">May 20 2020</td>
                <td>
                  <a href="details.html" class="btn btn-secondary">
                    <i class="fas fa-angle-double-right"></i> Details
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- MODALS -->

<!-- ADD POST MODAL -->
<div class="modal fade" id="addPostModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Post</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control">
              <option value="">Web Development</option>
              <option value="">Tech Gadgets</option>
              <option value="">Business</option>
              <option value="">Health & Wellness</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image">Upload Image</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image">
              <label for="image" class="custom-file-label">Choose File</label>
            </div>
            <small class="form-text text-muted">Max Size 3mb</small>
          </div>
          <div class="form-group">
            <label for="body">Body</label>
            <textarea name="editor1" class="form-control"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<!-- ADD CATEGORY MODAL -->
<div class="modal fade" id="addCategoryModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title">Add Category</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h5 class="modal-title">Add User</h5>
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="password2">Confirm Password</label>
            <input type="password" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" data-dismiss="modal">Save Changes</button>
      </div>
    </div>
  </div>
</div>

<?php
include 'inc/templates/footer.php';
?>