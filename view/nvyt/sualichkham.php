<?php 
    echo '<h1 class="appointment-title">Medical Appointment Details</h1>
    <form action="#" method="post" class="appointment-form">
        <table class="appointment-table">
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label for="patientName">Patient
                        Name:</label></th>
                <td class="appointment-table__data" data-label="Patient Name:">
                    <input type="text" id="patientName" name="patientName" required
                        class="appointment-input">
                </td>
            </tr>
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label
                        for="appointmentDate">Appointment Date:</label></th>
                <td class="appointment-table__data" data-label="Appointment Date:">
                    <input type="date" id="appointmentDate" name="appointmentDate" required
                        class="appointment-input">
                </td>
            </tr>
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label
                        for="appointmentTime">Appointment Time:</label></th>
                <td class="appointment-table__data" data-label="Appointment Time:">
                    <input type="time" id="appointmentTime" name="appointmentTime" required
                        class="appointment-input">
                </td>
            </tr>
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label for="doctorName">Doctor
                        Name:</label></th>
                <td class="appointment-table__data" data-label="Doctor Name:">
                    <input type="text" id="doctorName" name="doctorName" required
                        class="appointment-input">
                </td>
            </tr>
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label
                        for="speciality">Speciality:</label></th>
                <td class="appointment-table__data" data-label="Speciality:">
                    <input type="text" id="speciality" name="speciality" required
                        class="appointment-input">
                </td>
            </tr>
            <tr class="appointment-table__row">
                <th class="appointment-table__header"><label for="reason">Reason for
                        Visit:</label></th>
                <td class="appointment-table__data" data-label="Reason for Visit:">
                    <textarea id="reason" name="reason" required
                        class="appointment-input appointment-textarea"></textarea>
                </td>
            </tr>
        </table>
        <input type="submit" value="Save Appointment Details" class="appointment-submit">
    </form>';
?>