<!doctype html>
<html lang="en">

<head>
    <?php
        include '../templates/header.php';
        include '../templates/table.php';
        //include '../templates/dummyData.php';
    ?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row fluid-col-extra">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3>Finding Type</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Type&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>Lack of Authentication</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Privilege Escalation</td>
                        </tr>
                    </tbody>
                </table>
                <h3>Posture</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Posture&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>Insider</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Nearsider</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Threat Level</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Threat Relevance&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>Expected</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Predicted Possible</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Impact Level</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Confidentiality&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Integrity&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Availability&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>LOW</td>
                            <td>HIGH</td>
                            <td>LOW</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>MODERATE</td>
                            <td>MODERATE</td>
                            <td>LOW</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Finding Classification</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Classification&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>Vulnerability</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>INFO</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Countermeasure</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Countermeasure&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Effectiveness Rating&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>Add authenticator</td>
                            <td>10 Very High</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Check user privilege</td>
                            <td>8 High</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Event Classification</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Classification&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Current Event</td>
                            <td>Confidential</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Level</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Level&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>High</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Medium</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Event Type</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Event&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Type&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Current Event</td>
                            <td>CVPA</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Finding Impact Level</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Impact Level&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>High</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>Moderate</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Severity Category Code</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Finding&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Severity Category&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Finding 1</td>
                            <td>II</td>
                        </tr>
                        <tr>
                            <td>Finding 2</td>
                            <td>I</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Progress</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Task&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Progress&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Task 1</td>
                            <td>Assigned</td>
                        </tr>
                        <tr>
                            <td>Task 2</td>
                            <td>Complete</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Event Rules</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Rule&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Description&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1</td>
                            <td>Do not use MDK3.</td>
                        </tr>
                        <tr>
                            <td>#2</th>
                            <td>Assume minimal insider knowledge.</td>
                        </tr>
                    </tbody>
                </table>

                <h3>Report Template</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Report Template&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Description&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Risk Matrix</td>
                            <td>Matrix assessing likelihood and severity of risk.</td>
                        </tr>
                        <tr>
                            <td>Emergent Result Brief</td>
                            <td>A brief summarizing findings, systems, impacts, and risks.</td>
                        </tr>
                        <tr>
                            <td>Final Technical Result</td>
                            <td>A more detailed report with all findings, and a summary of the likelihood, impacts, and
                                risks.</td>
                    </tbody>
                </table>

                <h3>Notification</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Notification&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Duration&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                            <th scope="col">Frequency&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Task 1</td>
                            <td>2 days</td>
                            <td>24 hours</td>
                        </tr>
                        <tr>
                            <td>Task 2</td>
                            <td>4 hours</td>
                            <td>15 minutes</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!--Config content end-->
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
    <?php include '../templates/footer.php';?>
</body>

</html>