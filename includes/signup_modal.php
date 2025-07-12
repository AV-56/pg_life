<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Signup with PGLife</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <!-- ✅ Alert placeholder -->
        <div id="signup-alert" class="alert d-none" role="alert"></div>

        <!-- ✅ Loader -->
        <div id="signup-loader" class="text-center d-none mb-3">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>

        <form id="signup-form" method="POST">
          <!-- Full Name -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
            <input type="text" class="form-control" placeholder="Full Name" name="full_name" required />
          </div>

          <!-- Phone Number -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
            <input type="tel" class="form-control" placeholder="Phone Number" name="phone" required />
          </div>

          <!-- Email -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" class="form-control" placeholder="Email" name="email" required />
          </div>

          <!-- Password -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" class="form-control" placeholder="Password" name="password" required />
          </div>

          <!-- College Name -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-building"></i></span>
            <input type="text" class="form-control" placeholder="College Name" name="college_name" required />
          </div>

          <!-- Gender -->
          <div class="mb-3">
            <label class="form-label mr-3">I'm a</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="male" value="male" required />
              <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" id="female" value="female" required />
              <label class="form-check-label" for="female">Female</label>
            </div>
          </div>

          <!-- Submit -->
          <button type="submit" class="btn w-100" style="background-color: #114b5f; color: #e4fde1">
            Create Account
          </button>
        </form>
      </div>

      <div class="text-center py-3" style="background-color: #ebeae9">
        Already have an account?
        <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a>
      </div>
    </div>
  </div>
</div>
