# UIET Website Repo

This is the official repository of the UIET website. This is official account of UIETJU.

## Warning

- Never put the php database connection in any php file and in same directory as other public PHP files. Keep it outside of public_html directory and use require statements to include it inside your normal PHP file. This could lead to better seurity as including credentials in noraml PHP file can lead to security leaks and database being compromised.
