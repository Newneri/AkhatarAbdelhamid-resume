<div class="card">
    <h2>Add a Coach</h2>
    <form action="../requestsForms/ajouterProf.php" method="POST" autocomplete="off">
        <div class="form-element">
            <input type="text" placeholder="first-name" name="fname" required>
        </div>
        <div class="form-element">
            <input type="text" placeholder="last-name" name="lname" required>
        </div>
        <div class="form-element">
            <label for="date">Hiring Date</label>
            <input type="date" name="date-embauche" required>
        </div>
        <input type="submit" value="Add" class="mainBtn" name="submit">
    </form>
</div>