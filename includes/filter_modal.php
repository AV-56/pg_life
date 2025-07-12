<!-- Filter Modal -->
<div
  class="modal fade"
  id="filterModal"
  tabindex="-1"
  aria-labelledby="filterModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filterModalLabel">Filter PGs</h5>
        <button
          type="button"
          class="btn"
          data-bs-dismiss="modal"
          aria-label="Close"
        >
          <i class="fas fa-times"></i>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <!-- Price Range Filter -->
          <div class="mb-3">
            <label for="priceRange" class="form-label">Max Monthly Rent</label>
            <input
              type="range"
              class="form-range"
              min="3000"
              max="20000"
              step="500"
              id="priceRange"
            />
            <div class="d-flex justify-content-between">
              <small>Rs. 3,000</small>
              <small>Rs. 20,000</small>
            </div>
          </div>

          <!-- Gender Filter -->
          <div class="mb-3">
            <label class="form-label">Gender Preference</label><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="genderFilter"
                id="filterMale"
                value="male"
              />
              <label class="form-check-label" for="filterMale">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="genderFilter"
                id="filterFemale"
                value="female"
              />
              <label class="form-check-label" for="filterFemale">Female</label>
            </div>
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="genderFilter"
                id="filterBoth"
                value="both"
              />
              <label class="form-check-label" for="filterBoth">Both</label>
            </div>
          </div>

          <!-- Amenities Filter -->
          <div class="mb-3">
            <label class="form-label">Amenities</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="wifi" />
              <label class="form-check-label" for="wifi">Wi-Fi</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="ac" />
              <label class="form-check-label" for="ac">Air Conditioning</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="meals" />
              <label class="form-check-label" for="meals">Meals Included</label>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button
          type="button"
          class="btn btn-secondary"
          data-bs-dismiss="modal"
        >
          Close
        </button>
        <button type="button" class="btn btn-primary">Apply Filters</button>
      </div>
    </div>
  </div>
</div>
