<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
    <h1>Finding Overview</h1>
    <?php
    class SampleFinding{
        public $id;
        public $title;
        public $system;
        public $task;
        public $subtask;
        public $analyst;
        public $status;
        public $classification;
        public $type;
        public $risk;

        function __construct($id, $title, $system, $task, $subtask, $analyst, $status, $classification, $type, $risk){
            $this->id               = $id;
            $this->title            = $title;
            $this->system           = $system;
            $this->task             = $task;
            $this->subtask          = $subtask;
            $this->analyst          = $analyst;
            $this->status           = $status;
            $this->classification   = $classification;
            $this->type             = $type;
            $this->risk             = $risk;
        }

    }
    $sampleFindingList = array(new SampleFinding(1, 'Finding 1', 'System 1', 'Task 1', 'Subtask 1', 'kl.123.1.127.5', 'Open', 'Credentials Complexity', 'Vulnerability', 'VL'),
    new SampleFinding(2, 'Finding 2', 'System 2', 'Task 2', 'none', 'wb.123.1.124.2', 'Open', 'Port Security', 'Information', 'H'),
    new SampleFinding(3, 'Finding 3', 'System 3', 'Task 6', 'none', 'am.123.1.123.2', 'Closed', 'Creds', 'Information', 'VH'),
    new SampleFinding(4, 'Finding 4', 'System 4', 'Task 3', 'none', 'do.123.1.121.1', 'Closed', 'Creds', 'Vulnerability', 'M'),
    new SampleFinding(5, 'Finding 5', 'System 5', 'Task 9', 'Subtask 4', 'kl.123.1.127.5', 'Open', 'Least Privilege', 'Information', 'H'),
    new SampleFinding(6, 'Finding 6', 'System 6', 'Task 2', 'Subtask 2', 'jh.123.1.122.5', 'Open', 'Lack Of Autentication', 'Vulnerability', 'H'),
    new SampleFinding(7, 'Finding 7', 'System 7', 'Task 1', 'Subtask 4', 'wb.123.1.124.2', 'Open', 'Credentials Complexity', 'Vulnerability', 'VL'),
    );
    ?>

    <button type="button">Delete</button>
    <button type="button">Save</button>
    <button type="button">Cancel</button>

    <table border='1'>
        <tr>
            <th></th>
            <?php
            $arrowBtns = "<div class=\"arrow-group\"><button>&uarr;</button><button>&darr;</button></div>";
            print "<th>ID</th>";
            print "<th>Title $arrowBtns</th>";
            print "<th>System $arrowBtns</th>";
            print "<th>Task $arrowBtns</th>";
            print "<th>Subtask $arrowBtns</th>";
            print "<th>Analyst $arrowBtns</th>";
            print "<th>Status $arrowBtns</th>";
            print "<th>Classification $arrowBtns</th>";
            print "<th>Type $arrowBtns</th>";
            print "<th>Risk $arrowBtns</th>";
            ?>
        <tr>

    <?php
    foreach($sampleFindingList as $finding){
        print "<tr><td><input type =\"checkbox\"></td>";
        print "<td>$finding->id</td>";
        print "<td>$finding->title</td>";
        print "<td>$finding->system</td>";
        print "<td>$finding->task</td>";
        print "<td>$finding->subtask</td>";
        print "<td>$finding->analyst</td>";
        print "<td>$finding->status</td>";
        print "<td>$finding->classification</td>";
        print "<td>$finding->type</td>";
        print "<td>$finding->risk</td><tr>";
    }
    ?>

    </table>
    <button type="button">+</button>
    <button type="button">ERB Report</button>
    <button type="button">Risk Matrix</button>
    <button type="button">Final Report</button>

    <button type="button">?</button>
    <h1>Finding Detailed View</h1>

    <button type="button">?</button>
    <h1>Finding Information</h1>    
    <label for="id">ID:</label>
    <input type="text" id="id" name="id">
    
    <label for="hostName">Host Name:</label>
    <input type="text" id="hostName" name="hostName">

    <label for="ipPort">IP Port:</label>
    <input type="text" id="ipPort" name="ipPort">

    <label for="hostName">Host Name:</label>
    <input type="text" id="hostName" name="hostName">

    <label for="description">Description:</label>
    <input type="text" id="description" name="description">

    <label for="longDescription">Long Description:</label>
    <input type="text" id="longDescription" name="longDescription">

    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="open">Open</option>
        <option value="closed">Closed</option>
    </select>

    <label for="type">Type:</label>
    <select name="type" id="type">
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

    <label for="classification">Classification:</label>
    <select name="classification" id="classification">
        <option value="vul">Vulnerability</option>
        <option value="info">Information</option>
    </select>

    <label for="evidence">Evidence:</label>
    <input type="file" id="evidence", name="evidence">

    <label for="system">System:</label>
    <select name="system" id="system">
        <option value="system1">System 1</option>
        <option value="system2">System 2</option>
        <option value="system3">System 3</option>
        <option value="system4">System 4</option>
    </select>

    <label for="or">OR</label>  

    <label for="task">Task:</label>
    <select name="task" id="task">
        <option value="task1">Task 1</option>
        <option value="task2">Task 2</option>
        <option value="task3">Task 3</option>
        <option value="task4">Task 4</option>
    </select>

    <label for="or">OR</label>  

    <label for="subtask">Subtask:</label>
    <select name="subtask" id="subtask">
        <option value="subtask1">Subtask 1</option>
        <option value="subtask2">Subtask 2</option>
        <option value="subtask3">Subtask 3</option>
        <option value="subtask4">Subtask 4</option>
    </select>

    <label for="relatedFinding">Related Finding(s):</label>
    <select name="relatedFinding" id="relatedFinding" multiple>
        <option value="finding4">Finding 4</option>
        <option value="finding1">Finding 1</option>
        <option value="finding2">Finding 2</option>
        <option value="finding7">Finding 7</option>
    </select>

    <button type="button">?</button>
    <h1>Finding Impact</h1>   
    <label for="confidentiality">Confidentiality:</label>
    <select name="confidentiality" id="confidentiality">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
        <option value="information">Information</option>
    </select>

    <label for="integrity">Integrity:</label>
    <select name="integrity" id="integrity">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
        <option value="information">Information</option>
    </select>

    <label for="availability">Availability:</label>
    <select name="availability" id="availability">
        <option value="low">Low</option>
        <option value="medium">Medium</option>
        <option value="high">High</option>
        <option value="information">Information</option>
    </select>

    <button type="button">?</button>
    <h1>Analyst Information</h1>   
    <label for="analyst">Analyst</label>
    <select name="analyst" id="analyst" multiple>
        <option value="anal1">am.123.1.123.2</option>
        <option value="anal2">ja.123.1.127.3</option>
        <option value="anal3">do.123.1.121.1</option>
        <option value="anal4">wb.123.1.125.7</option>
    </select>

    <label for="collaborator">Collaborator:</label>
    <select name="collaborator" id="collaborator" multiple>
         <option value="anal1">am.123.1.123.2</option>
        <option value="anal2">ja.123.1.127.3</option>
        <option value="anal3">do.123.1.121.1</option>
        <option value="anal4">wb.123.1.125.7</option>
    </select>

    <label for="posture">Posture:</label>
    <select name="posture" id="posture">
        <option value="insider">Insider</option>
        <option value="insiderNearsider">Insider-Nearsider</option>
        <option value="outsider">Outsider</option>
        <option value="nearsider">Nearsider</option>
        <option value="nearsiderOutsider">Nearsider-outsider</option>
    </select>

    <button type="button">?</button>
    <h1>Mitigation</h1>  
    <label for="briefDescription">Brief Description:</label>
    <input type="text" id="briefDescription" name="briefDescription">

    <label for="longDescription">Long Description:</label>
    <input type="text" id="longDescription" name="longDescription">

    <button type="button">?</button>
    <h1>Threat Relevance</h1> 
    <label for="relevance">Relevance:</label>
    <select name="relevance" id="relevance">
        <option value="confirmed">Confirmed</option>
        <option value="expected">Expected</option>
        <option value="anticipated">Anticipated</option>
        <option value="predicted">Predicted</option>
        <option value="possible">Possible</option>
    </select>

    <button type="button">?</button>
    <h1>Counter Measure</h1> 
    <label for="effectivenessRating">Effectiveness Rating:</label>
    <select name="effectivenessRating" id="effectivenessRating">
        <option value="veryHigh">Very high(10)</option>
        <option value="high">High(7-9)</option>
        <option value="moderate">Moderate(4-6)</option>
        <option value="low">Low(1-3)</option>
        <option value="veryLow">Very low(0)</option>
    </select>

    <button type="button">?</button>
    <h1>Impact</h1> 
    <label for="impactDescription">Impact Description:</label>
    <input type="text" id="impactDescription", name="impactDescription">   

    <label for="impactLevel">Impact Level:</label>
    <select name="impactLevel" id="impactLevel">
        <option value="vh">VH</option>
        <option value="h">H</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="vl">VL</option>
        <option value="info">Information</option>
    </select>
    
    <button type="button">?</button>
    <h1>Severity</h1> 
    <label for="severityCategoryScore">Severity Category Score:</label>
    <input type="text" id="severityCategoryScore", name="severityCategoryScore">   

    <label for="vulnerabilitySeverity">Vulnerability Severity:</label>
    <input type="text" id="vulnerabilitySeverity", name="vulnerabilitySeverity">  

    <label for="quantativeVulnerabilitySeverity">Quantative Vulnerability Severity:</label>
    <input type="text" id="quantativeVulnerabilitySeverity", name="quantativeVulnerabilitySeverity">  

    <button type="button">?</button>
    <h1>Risk</h1> 
    <label for="risk">Risk:</label>
    <input type="text" id="risk", name="risk">   

    <label for="likelihood">Likelihood:</label>
    <input type="text" id="likelihood", name="likelihood">  

    <button type="button">?</button>
    <h1>Finding System Level Impact</h1> 
    <label for="confidentialityFindingImpactOnSys">Confidentiality Finding Impact On System:</label>
    <input type="text" id="confidentialityFindingImpactOnSys", name="confidentialityFindingImpactOnSys">   

    <label for="integrityFindingImpactOnSys">Integrity Finding Impact On System:</label>
    <input type="text" id="integrityFindingImpactOnSys", name="integrityFindingImpactOnSys">  
    
    <label for="availabilityFindingImpactOnSys">Availability Finding Impact On System:</label>
    <input type="text" id="availabilityFindingImpactOnSys", name="availabilityFindingImpactOnSys">   

    <label for="impact">Impact Score:</label>
    <input type="text" id="impact", name="impact"> 
    <br>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>