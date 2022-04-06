
   
   
   <form action = "index.php" method = "post">
        <fieldset>
          <legend>Bejlentkezés</legend>
          <br>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Felhasználónév" aria-label="felhasznalo" name="felhasznalo"required>
            </div>
            <div class="col">
              <input type="password" class="form-control" placeholder="Jelszó" aria-label="jelszo" name="jelszo" required>
            </div>
          </div><br>
          <input type="submit" class="btn btn-outline-secondary" name="regisztracio" value="Belépés">
          <br>&nbsp;
        </fieldset>
      </form>
  
      <h4 class="text-muted">Regisztrálja magát, ha még nem felhasználó!</h4>
      <form action = "regisztracio.php" method = "post">
        <fieldset>
          <legend>Regisztráció</legend>
          <br>
          <div class="row">
            <div class="col">
          <input type="text" class="form-control" name="vezeteknev" placeholder="vezetéknév" required>
          </div>
          <div class="col">
          <input type="text" class="form-control" name="utonev" placeholder="utónév" required>
          </div>
        </div><br>
        <div class="row">
            <div class="col">
          <input type="text" class="form-control" name="felhasznalo" placeholder="felhasználói név" required>
            </div>
            <div class="col">
          <input type="password" class="form-control" name="jelszo" placeholder="jelszó" required>
        </div>
        </div><br>
          <input type="submit" class="btn btn-outline-secondary" name="regisztracio" value="Regisztráció">
          <br>&nbsp;
        </fieldset>
      </form>
