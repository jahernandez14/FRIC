<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
<div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style = "background-color:#202020">
            <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
            <h2 class = "text-center">Finding Overview</h2>
            <table class="table table-light table-striped">
                <thead>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <th scope="col">ID &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Title &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">System &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Task &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Subtask &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Analyst &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Status &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Classification &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Type &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    <th scope="col">Risk &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <td>1</td>
                    <td>Finding 1</td>
                    <td>System 1</td>
                    <td>Task 2</td>
                    <td>Subtask 3</td>
                    <td>am.123.1.123.2</td>
                    <td>Open</td>
                    <td>Credentials Complexity</td>
                    <td>Vulnerability</td>
                    <td>VL</td>
                    </tr>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <td>2</td>
                    <td>Finding 2</td>
                    <td>System 4</td>
                    <td>Task 3</td>
                    <td>Subtask 3</td>
                    <td>wb.123.1.123.2</td>
                    <td>Closed</td>
                    <td>Autentication Bypass</td>
                    <td>Vulnerability</td>
                    <td>VL</td>
                    </tr>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <td>3</td>
                    <td>Finding 3</td>
                    <td>System 1</td>
                    <td>Task 1</td>
                    <td>Subtask 3</td>
                    <td>am.123.1.123.2</td>
                    <td>Open</td>
                    <td>Credentials Complexity</td>
                    <td>Vulnerability</td>
                    <td>L</td>
                    </tr>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <td>4</td>
                    <td>Finding 4</td>
                    <td>System 6</td>
                    <td>Task 5</td>
                    <td>Subtask 3</td>
                    <td>jh.123.1.123.2</td>
                    <td>Closed</td>
                    <td>Plain Text Web Login</td>
                    <td>Vulnerability</td>
                    <td>VH</td>
                    </tr>
                    <tr>
                    <th scope="col"><input type="checkbox"></th>
                    <td>5</td>
                    <td>Finding 5</td>
                    <td>System 1</td>
                    <td>Task 6</td>
                    <td>Subtask 3</td>
                    <td>do.123.1.123.2</td>
                    <td>Closed</td>
                    <td>Credentials Complexity</td>
                    <td>Information</td>
                    <td>VL</td>
                    </tr>
                </tbody>
                </table>

                <button type="button">+</button>
                <button type="button">Delete</button>
                <button type="button">Save</button>
                <button type="button">Cancel</button>

                <h2 class = "text-center">Finding Detailed View</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Title</label>
                        <input type="text" class="form-control" placeholder="Finding 1">
                        </div>
                        <div class="col-3">
                        <label>Host Name</label>
                        <input type="text" class="form-control" id="hostName">
                        </div>
                        <div class="col-2">
                        <label>IP Port</label>
                        <input type="text" class="form-control" id="ipPort">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>Description</label>
                        <textarea class="form-control" id="Desc" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>Long Description</label>
                        <textarea class="form-control" id="Desc" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="open">Open</option>
                            <option value="closed">Closed</option>
                        </select>
                        </div>
                        <div class="col-4">
                        <label>Type</label>
                        <select name="type" class="form-control" id="type">
                            <option value="credentialsComplexity">Credentials Complexity</option>
                            <option value="manufactureDefault">Manufacture Default</option>
                            <option value="creds">Creds</option>
                            <option value="lOA">Lack Of Autentication</option>
                            <option value="plainTextProtocols">Plain Text Protocols</option>
                            <option value="plainTextWebLogin">Plain Text Web Login</option>
                            <option value="encryption">Encryption</option>
                            <option value="authenticationBypass">Autentication Bypass</option>
                            <option value="portSecurity">Port Security</option>
                            <option value="accessContr">Access Control</option>
                            <option value="leastPriv">Least Privilege</option>
                            <option value="privEscalation">Privilege Escalation</option>
                            <option value="missingPatches">Missing Patches</option>
                            <option value="physicalSec">Physical Security</option>
                            <option value="infoDisclosure">Information Disclosure</option>
                        </select>
                        </div>
                        <div class="col-2">
                        <label>Classification</label>
                        <select name="classification" class="form-control" id="classification">
                            <option value="vul">Vulnerability</option>
                            <option value="info">Information</option>
                        </select>
                        </div>
                        <div class="col-4">
                        <label>Evidence:</label>
                        <input type="file" class="form-control" id="evidence">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>System</label>
                        <select name="system" class="form-control" id="system">
                            <option value="system1">System 1</option>
                            <option value="system2">System 2</option>
                            <option value="system3">System 3</option>
                            <option value="system4">System 4</option>
                        </select>
                        </div>
                        <div>
                        <label>OR</label>  
                        </div>
                        <div class="col">
                        <label>Task</label>
                        <select name="task" class="form-control" id="task">
                            <option value="task1">Task 1</option>
                            <option value="task2">Task 2</option>
                            <option value="task3">Task 3</option>
                            <option value="task4">Task 4</option>
                        </select>
                        </div>
                        <div>
                        <label>OR</label>  
                        </div>
                        <div class="col">
                        <label for="subtask">Subtask:</label>
                        <select name="subtask" class="form-control" id="subtask">
                            <option value="subtask1">Subtask 1</option>
                            <option value="subtask2">Subtask 2</option>
                            <option value="subtask3">Subtask 3</option>
                            <option value="subtask4">Subtask 4</option>
                        </select>
                        </div>
                        <div class="col">
                        <label>Related Finding(s):</label>
                        <select name="relatedFinding" class="form-control" id="relatedFinding" multiple>
                            <option value="finding4">Finding 4</option>
                            <option value="finding1">Finding 1</option>
                            <option value="finding2">Finding 2</option>
                            <option value="finding7">Finding 7</option>
                        </select>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Finding Impact</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Confidentiality</label>
                        <select name="confidentiality" class="form-control" id="confidentiality">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="information">Information</option>
                        </select>
                        </div>
                        <div class="col">
                        <label>Integrity</label>
                        <select name="integrity" class="form-control" id="integrity">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="information">Information</option>
                        </select>
                        </div>
                        <div class="col">
                        <label>Availability</label>
                        <select name="availability" class="form-control" id="availability">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                            <option value="information">Information</option>
                        </select>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Analyst Information</h2>
                <form>
                    <div class="row">
                        <div class="col-4">
                        <label>Analyst</label>
                        <select name="analyst" class="form-control" id="analyst" multiple>
                            <option value="anal1">am.123.1.123.2</option>
                            <option value="anal2">ja.123.1.127.3</option>
                            <option value="anal3">do.123.1.121.1</option>
                            <option value="anal4">wb.123.1.125.7</option>
                        </select>
                        </div>
                        <div class="col-4">
                        <label>Collaborator</label>
                        <select name="collaborator" class="form-control" id="collaborator" multiple>
                            <option value="anal1">am.123.1.123.2</option>
                            <option value="anal2">ja.123.1.127.3</option>
                            <option value="anal3">do.123.1.121.1</option>
                            <option value="anal4">wb.123.1.125.7</option>
                        </select>
                        </div>
                        <div class="col-4">
                        <label>Posture</label>
                        <select name="posture" class="form-control" id="posture">
                            <option value="insider">Insider</option>
                            <option value="insiderNearsider">Insider-Nearsider</option>
                            <option value="outsider">Outsider</option>
                            <option value="nearsider">Nearsider</option>
                            <option value="nearsiderOutsider">Nearsider-outsider</option>
                        </select>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Mitigation</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Brief Description</label>
                        <textarea class="form-control" id="Desc" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>Long Description</label>
                        <textarea class="form-control" id="Desc" rows="5"></textarea>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Threat Relevance</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Relevance</label>
                        <select name="relevance" class="form-control" id="relevance">
                            <option value="confirmed">Confirmed</option>
                            <option value="expected">Expected</option>
                            <option value="anticipated">Anticipated</option>
                            <option value="predicted">Predicted</option>
                            <option value="possible">Possible</option>
                        </select>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Counter Measure</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Impact Description</label>
                        <textarea class="form-control" id="Desc" rows="3"></textarea>
                        </div>
                        <div class="col">
                        <label>Impact Level</label>
                        <select name="impactLevel" class="form-control" id="impactLevel">
                            <option value="vh">VH</option>
                            <option value="h">H</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="vl">VL</option>
                            <option value="info">Information</option>
                        </select>
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Severity</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Severity Category Score:</label>
                        <input type="text" class="form-control" id="severityCategoryScore"> 
                        </div>
                        <div class="col">
                        <label>Severity Category Score:</label>
                        <input type="text" class="form-control" id="severityCategoryScore">
                        </div>
                        <div class="col">
                        <label>Vulnerability Severity:</label>
                        <input type="text" class="form-control" id="vulnerabilitySeverity">
                        </div>
                        <div class="col">
                        <label>Quantative Vulnerability Severity:</label>
                        <input type="text" class="form-control" id="quantativeVulnerabilitySeverity"> 
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Risk</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Risk</label>
                        <input type="text" class="form-control" id="risk">  
                        </div>
                        <div class="col">
                        <label>Likelihood</label>
                        <input type="text" class="form-control" id="likelihood"> 
                        </div>
                    </div>
                </form>

                <h2 class = "text-center">Finding System Level Impact</h2>
                <form>
                    <div class="row">
                        <div class="col">
                        <label>Confidentiality Finding Impact On System</label>
                        <input type="text" class="form-control" id="confidentialityFindingImpactOnSys">  
                        </div>
                        <div class="col">
                        <label>Integrity Finding Impact On System</label>
                        <input type="text" class="form-control" id="integrityFindingImpactOnSys"> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label>Availability Finding Impact On System</label>
                        <input type="text" class="form-control" id="availabilityFindingImpactOnSys">  
                        </div>
                        <div class="col">
                        <label>Impact Score</label>
                        <input type="text" class="form-control" id="impact">
                        </div>
                    </div>
                </form>

                <button type="button">?</button>
                <button type="button">Archive</button>
                <button type="button">Demote</button>
                <button type="button">Save</button>
                <button type="button">Cancel</button>
            </div>
            <div class="col-2"  style = "background-color:#202020">
            <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>