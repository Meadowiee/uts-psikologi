<section id="tes" class="section soal-section bg-tes">
  <div class="container text-center">
    <h2>Soal Deret Angka #<?= $index + 1 ?></h2>
    <p class="mt-2 mb-4">
      <?= implode(', ', json_decode($question['soal'])) ?>, ?
    </p>

    <form action="<?= base_url("/test/save-answer") ?>" method="post">
      <input type="hidden" name="quiz_id" value="<?= esc($quiz_id) ?>">
      <input type="hidden" name="question_id" value="<?= esc($question['id']) ?>">
      <input type="hidden" name="index" value="<?= esc($index) ?>">
      <input type="hidden" name="direction" id="directionInput" value="1">
      <input type="hidden" name="answer" id="answerInput">

      <!-- Angka pilihan -->
      <div class="jawaban-pilihan d-flex justify-content-center gap-3 flex-wrap">
        <?php for ($i = 0; $i <= 9; $i++): ?>
          <button type="button" class="angka-pilihan" data-value="<?= $i ?>"><?= $i ?></button>
        <?php endfor; ?>
      </div>

      <!-- Jawaban user -->
      <div id="jawabanPreview" class="mt-4 mb-0 d-none">
        <h5 class="mb-4">Jawabanmu:</h5>
        <span class="btn-gradient-main px-3 py-2 mt-3" id="previewAnswerText"></span>
      </div>

      <!-- Keterangan dan hapus -->
      <div id="opsiButtons" class="d-flex justify-content-center flex-wrap gap-5 mt-4 d-none">
        <button type="button" id="undoBtn" class="neon-btn neon-biru">
            <i class="bi bi-arrow-counterclockwise fs-bold"></i> Undo
        </button>
        <button type="button" id="clearBtn" class="neon-btn neon-merah">
            <i class="bi bi-trash"></i> Hapus
        </button>
      </div>

      <!-- Navigasi -->
      <div class="mt-4 d-flex justify-content-center">
        <?php if ($index > 0): ?>
          <button type="submit" name="direction" value="-1" class="btn-kembali me-3">Kembali</button>
        <?php endif; ?>

        <?php if ($index < $total - 1): ?>
          <button type="submit" name="direction" value="1" class="btn-kembali">Lanjut</button>
        <?php else: ?>
          <button type="submit" name="direction" value="1" class="btn-gradient">Selesai</button>
        <?php endif; ?>
      </div>
    </form>
  </div>
</section>


<script>
  const selectedAnswers = [];
  const answerInput = document.getElementById('answerInput');
  const preview = document.getElementById('previewAnswerText');
  const previewContainer = document.getElementById('jawabanPreview');
  const opsiButtons = document.getElementById('opsiButtons');

  document.querySelectorAll('.angka-pilihan').forEach(btn => {
    btn.addEventListener('click', () => {
      const value = parseInt(btn.dataset.value);
      if (!selectedAnswers.includes(value)) {
        selectedAnswers.push(value);
        updatePreview();
      }
    });
  });

  document.getElementById('undoBtn').addEventListener('click', () => {
    selectedAnswers.pop();
    updatePreview();
  });

  document.getElementById('clearBtn').addEventListener('click', () => {
    selectedAnswers.length = 0;
    updatePreview();
  });

  function updatePreview() {
    preview.textContent = selectedAnswers.join('');
    answerInput.value = selectedAnswers.join(' ');
    const hasAnswer = selectedAnswers.length > 0;
    previewContainer.classList.toggle('d-none', !hasAnswer);
    opsiButtons.classList.toggle('d-none', !hasAnswer);
  }
</script>
