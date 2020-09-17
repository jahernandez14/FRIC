<div id="sync" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeSync()">&times;</a>
  <div class="overlay-content container col-5">
    <h2>Sync</h2>
    <form>
      <div class="row">
        <div class="col-1">
        <label> &nbsp;</label>
            <input type="checkbox" class="form-control">
        </div>
          <div class="col">
              <label>From</label>
              <select name="Confidentiality" class="form-control" id="confidentiality">
                        <option value="am.123.1.123.2">am.123.1.123.2</option>
                        <option value="mm.123.1.123.3">mm.123.1.123.3</option>
                        <option value="sr.123.1.123.4">sr.123.1.123.4</option>
                    </select>
          </div>
          <div class="col">
              <label>IP</label>
              <input type="text" class="form-control">
          </div>
      </div>
    <div class="row">
        
        <div class = "col">
            <h2><br/>Delete</h2>
        </div>
    </div>
    <div class="row">
    <div class="col-1">
        <label> &nbsp;</label>
            <input type="checkbox" class="form-control">
        </div>
      <div class="col container">
              <label>Analyst Initials</label>
              <input type="text" class="form-control">
          </div>
          <div class="col">
              <label>IP Address</label>
              <input type="text" class="form-control">
          </div>
      </div>

      <div class="row">
        <div class="col">
          <br></br>
        <button type="button" href="javascript:void(0)" class="btn btn-light" onclick="closeSync()">Sync</button>
        </div>
      </div>
      </form>
  </div>
</div>