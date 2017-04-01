===============================================================
        Antal insjukna i olika sjukdomar. (diagnoses)
===============================================================

CREATE VIEW v_sick_per_diagnoses AS 
SELECT COUNT(*), diagnos_id FROM PatientDiagnos GROUP BY diagnos_id;


===============================================================
                Antal insjukna patienter.
===============================================================

CREATE VIEW v_sick_patients AS
SELECT COUNT(patient_id) from Patient;

===============================================================
    Visa olika mediciner och dosering för en viss sjukdom.
===============================================================

CREATE VIEW v_medicine_doze AS
SELECT 
Medicine.name as med_name,
doseOZ,
 Diagnos.name as dia_name
FROM Medicine INNER JOIN Diagnos ON Medicine.medicine_id = Diagnos.diagnos_id;


===============================================================
      Vilka sjuksköterskor som behandlar en viss patient.
===============================================================


CREATE VIEW v_nursePatient AS
SELECT 
Nurse.nurse_id, 
Nurse.firstname as Nurse_firstname,
Nurse.lastname as Nurse_lastname,
Patient.patient_id, 
Patient.firstname as Patient_firstname,
Patient.lastname as Patient_lastname
FROM ((NursePatient
INNER JOIN Nurse ON NursePatient.nurse_id = Nurse.nurse_id)
INNER JOIN Patient ON NursePatient.patient_id  = Patient.patient_id);


===============================================================
        Visa vilka patienter behandlas av en läkare.
===============================================================
CREATE VIEW v_doctorPatient AS
SELECT 
Doctor.doctor_id,
 Doctor.firstname as Doctor_firstname,
 Doctor.lastname as Doctor_lastname,
 Patient.patient_id, 
 Patient.firstname as Patient_firstname, 
 Patient.lastname as Patient_lastname
FROM Patient INNER JOIN Doctor on Patient.doctor_id = Doctor.doctor_id WHERE Doctor.doctor_id = 1;

===============================================================
        Store procedure för antal insjuknade i rabies.
===============================================================
CREATE VIEW diagnosRabies AS

CREATE PROCEDURE treatDiagnosis
(IN arr INT(11))
BEGIN
    SELECT COUNT(*), Diagnos.name, Diagnos.diagnos_id
    FROM PatientDiagnos
    INNER JOIN Diagnos ON PatientDiagnos.diagnos_id = Diagnos.diagnos_id 
    WHERE Diagnos.diagnos_id = arr;
END;