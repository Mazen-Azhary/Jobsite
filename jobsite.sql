use jobsite;
CREATE TABLE apps (
    app_id INT PRIMARY KEY UNIQUE NOT NULL AUTO_INCREMENT,
    applicant_id INT NOT NULL,
    job_id INT NOT NULL,
    recruiter_id INT NOT NULL,
    status VARCHAR(255) NOT NULL DEFAULT 'pending',
    application_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_applicant_id_apps
        FOREIGN KEY (applicant_id)
        REFERENCES users(user_id),
    CONSTRAINT fk_job_id_apps
        FOREIGN KEY (job_id)
        REFERENCES jobs(job_id),
    CONSTRAINT fk_recruiter_id_apps
        FOREIGN KEY (recruiter_id)
        REFERENCES jobs(recruiter_id)
);
