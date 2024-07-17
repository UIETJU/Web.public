# UIET Website Repo

This is the official repository of the UIET website. This is the official GitHub account of UIET JU.
## Google Form CMS
- This website contains a unique php based cms for dynamic rendering of content using google forms. Please beware of the php code snippets implementing the cms.
- Refer the existing components implemented using this system (gallery, home screen, Notification system etc.) to understand the working and development of new components along the same line
  
### Objectives of this system

- **Simplify Content Management**:
  - Create an intuitive system that allows non-technical users to easily update website content using Google Forms.

- **Automate Data Processing**:
  - Utilize Google Apps Script to automate data validation and transfer from Google Sheets to the MySQL database, minimizing manual intervention.

- **Ensure Real-Time Updates**:
  - Implement PHP scripts to dynamically fetch and display updated content on the website, ensuring the information is current and accurate.

- **Enhance Usability and Accessibility**:
  - Design a user-friendly interface that all stakeholders, regardless of technical skills, can use to update website components like the gallery, notifications, and profiles.

- **Improve Website Reliability**:
  - Develop a robust system that reduces the risk of website crashes and ensures continuous availability of up-to-date content.

- **Facilitate Collaborative Content Management**:
  - Enable multiple users to contribute to and manage website updates simultaneously through Google Sheets’ collaborative features.

- **Cost-Effective Solution**:
  - Leverage free Google tools to provide a cost-effective content management solution without the need for expensive CMS licenses or dedicated IT maintenance.

- **Scalability for Future Needs**:
  - Design the system to be easily expandable to accommodate future additions and new features, ensuring long-term usability and flexibility.

## Warning

- Do not include database connection file in public files and directories. Keep it outside of public_html directory and use require statements to include it inside your normal PHP file.
