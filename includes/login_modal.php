<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    
      <div class="modal-header">
        <h5 class="modal-title">Login to PGLife</h5>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
          <i class="fas fa-times"></i>
        </button>
      </div>

      <div class="modal-body">
        <form id="login-form" class="form" >
          <!-- Email -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input
              type="email"
              class="form-control"
              name="email"
              placeholder="Email"
              required
            />
          </div>

          <!-- Password -->
          <div class="input-group mb-3">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input
              type="password"
              class="form-control"
              name="password"
              placeholder="Password"
              required
            />
          </div>

          <!-- Submit -->
          <button type="submit" class="btn w-100" style="background-color: #114b5f; color: #e4fde1">
            Login
          </button>
        </form>
      </div>

      <div class="text-center py-3" style="background-color: #ebeae9">
        Don't have an account?
        <a href="#" data-bs-toggle="modal" data-bs-target="#signupModal" data-bs-dismiss="modal">
          Create one
        </a>
      </div>

    </div>
  </div>
</div>
