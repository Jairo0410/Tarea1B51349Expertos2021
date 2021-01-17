<?php  view('header.php') ?>
<?php  view('navbar.php') ?>

<div class="form-group">
    <label> Confiabilidad (2 a 5) </label>
    <input type="number" class="form-control" name="reliability" id="reliability" min="2" max="5" required>
</div>
<div class="form-group">
    <label> Numero de enlaces (7 a 20) </label>
    <input class="form-control" type="number" name="links" id="links" min="7" max="20" required>
</div>
<div class="form-group">
    <label> Capacidad de la red </label>
    <select class="form-control" name="capacity" id="capacity" required>
        <option value="Low">Baja</option>
        <option value="Medium">Media</option>
        <option value="High">Alta</option>
    </select>
</div>
<div class="form-group">
    <label> Costo de la red </label>
    <select class="form-control" name="cost" id="cost" required>
        <option value="Low">Baja</option>
        <option value="Medium">Media</option>
        <option value="High">Alta</option>
    </select>
</div>
<button class="btn btn-primary" onclick="makeGuess()"> Predecir </button>
<div>
    <label> Prediccion </label>
    <input type="text" id="prediction" class="form-control">
</div>

<script>
    function makeGuess() {
        const reliability = document.getElementById('reliability').value;
        const links = document.getElementById('links').value;
        const capacity = document.getElementById('capacity').value
        const cost = document.getElementById('cost').value;

        $.ajax({
            url: '?controller=network&action=get_class',
            method: 'POST',
            data: {
                reliability: reliability,
                links: links,
                capacity: capacity,
                cost: cost
            },
            success: function(response) {
                document.getElementById('prediction').value = response
            }
        })
    }
</script>

<?php  view('footer.php') ?>