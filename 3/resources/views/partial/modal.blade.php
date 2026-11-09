<div class="modal fade" id="fractionModal" tabindex="-1"
     aria-labelledby="modalLabel">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>

                <button type="button" class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <img src="" id="modalImg"
                     class="img-fluid mb-3" alt="">

                <p>
                    <span id="modalPopover"
                          data-bs-toggle="popover"
                          data-bs-trigger="hover">
                    </span>
                </p>

                <p id="modalDescr"></p>

                <button type="button" class="btn btn-primary"
                        onclick="showToast()">
                    <i class="fas fa-download"></i> Загрузить
                </button>

                <a href="#" id="editFractionBtn" class="btn btn-warning">
                    Редактировать
                </a>

                <form
                    id="deleteFractionForm"
                    method="POST"
                    action="#"
                    data-url-template="{{ route('fractions.destroy', ['fraction' => '__ID__']) }}"
                >
                    @csrf
                    @method('DELETE')

                    <button id="deleteFractionBtn" type="submit" class="btn btn-danger">
                        Удалить
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>