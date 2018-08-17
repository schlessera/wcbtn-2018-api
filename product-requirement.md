**Ideation App**

Product Requirements

_Version 1.0.0_

_Last Updated: 17 August 2018_


## Document History

Version 1.0.0 - **Sean Blakeley** _Created_ _(17 Aug 2018)_


## Document Objectives

This document is intended to outline the project requirements for the Ideation App. It aims to provide all stakeholders - internal and external - with an understanding of the project scope and high-level feature set.

This document will likely be used in conjunction with the Project Initiation Document (PID).

Other technical documentation (for example, REST API technical docs) will follow on from this document.


## OverView

Our client believes there is an opportunity for a new app in the marketplace, and want to create a minimum viable product (MVP) version to test the proposition. The new app will be called **Ideation**, and enables users to easily create & save an idea - and add a reminder for a follow-up.

The app will use WordPress as the data source. A user will need to create an account via the website. Once registered, the user can login in via the app and be authenticated.

Upon successful user authentication, WordPress will expose the ideas created by the user.

**WordPress Site Considerations:**

1.  Open registration
2.  Users will need to default to _idea_managers _user role
3.  Access to the site should be locked to admin only
4.  Register meta fields as custom fields to the response
5.  Users can only see ideas they have created
6.  Authenticate users via the JSON Web Token

**App Considerations:**



1.  Needs to be available to both Android and iOS users
2.  Users able to read, create, edit & delete ideas, reminder text and reminder dates
3.  Users can dismiss reminders
4.  Ideas are automatically stored

**Registration**

Users will need to register on the site and create an account. Once registration has been completed and the user is created, they can use the same registration details within the app.

**Authentication**

WordPress will handle authentication via JSON Web Token (JWT) to authenticate users from WordPress into the app.

**Content Creation**

Users should be able to:

*   Create new ideas (including creating reminder text and date)
*   Edit existing ideas (including adding new reminder text and date)
*   Delete content (with a safety check alert)

Users will create content exclusively from the app (there will be no web interface other than registration).

Users can create a new ideas which map to an ideas CPT within WordPress.

**Data Structure** _(anatomy of an Idea)_:

*   Idea (maps to Title)
*   Author (current user ID)
*   Reminder Content (maps to custom meta field)
*   Reminder Date (maps to custom meta field)


## MoSCoW Method

**Must Have**

1.  Registration
2.  Login
3.  Account Recovery
4.  Add Ideas
5.  Edit Ideas
6.  Delete Ideas
7.  Reminder date and text as optional
8.  Add Reminder Date
9.  Edit Reminder Date
10.  Delete Reminder Date
11.  Add Reminder Text
12.  Edit reminder text
13.  Delete reminder test
14.  Dismiss Reminders
15.  Available across devices
16.  iOS & Android versions (at least)

**Should Have**

1.  Sync across devices button
2.  Reminders Search
3.  Ideas Search

**Could Have**

1.  Splash Screen
2.  Add User Name to registration
3.  Reminders Search
4.  Image uploading
5.  Add email to registration
6.  Slide to Delete function for reminders

**Won't Have**

1.  Website Access
2.  My Account Area
3.  Reminder Alerts
4.  Idea Categories or tags


## User Stories

1.  **User Story: **As a user, I need to be able to register for Ideation so I start saving ideas

		**Actions: **Registration will happen on the WordPress site, with a link from within the App


		**Task List:**

2.  **User Story: **As a user, I need to add my first and last name on registration, to personalise the app experience

		**Actions: **(Could have) need to be capture via WordPress registration process


		**Task List:**

3.  **User Story: **As a user, I need to add my email to the registration process, so I can recover my password (and potentially receive reminder updates in a later iteration)

		**Actions: **Covered by WordPress registration


		**Task List:**

4.  **User Story: **As a user, I need to be able to recover my password, so I can resign into my account (or sign in on other devices)

		**Actions: **A link to the 'lost your password?' functionality within WordPress


		**Task List:**

5.  **User Story: **As a user, I want to be able to use the app across multiple devices and see my ideas

		**Actions: **The ideas will be stored within WordPress - with each user as the 'author' of each idea. Nothing is stored locally, so once logged in, the user can see their own ideas (from any device)


		**Task List:**

6.  **User Story: **As a user, I want a sync button to update my ideas and synchronize across other devices

		**Actions: **This can simply trigger a new API call (to update the content)


		**Task List:**

7.  **User Story: **As a user, I need to be able to login to me account so I can access previously stored ideas

		**Actions: **The login process is handled within the App (via JWT) - so the user can use the app to login.


		**Task List:**

8.  **User Story: **As a user, I need clear indication of next actions if my login attempt fails

		**Actions: **We can flag a failed attempt within the app screen (we are sent an error code via the API)


		**Task List:**

9.  **User Story: **As a user, after I successfully login I want to stay automatically logged into my account whenever I open the app, so I can quickly record ideas

		**Actions: **If a pre-existing (and valid) token is found, the user will be logged in automatically


		**Task List:**

10.  **User Story: **As a user, I want a clear indication of now to create an idea so I don't feel lost on first load

		**Actions: **If we don't find any ideas, we display a call-to-action message to create an idea


		**Task List:**

11.  **User Story: **As a user, I need to be able to see a list of my ideas and search via text

		**Actions: **The App will use the search component to enable text search against ideas


		**Task List:**

12.  **User Story: **As a user, I need to be able to see my pending and overdue reminders for actions so I can follow-up my ideas

		**Actions: **The app will list reminders in date order (the most overdue or soonest at the top)


		**Task List:**

13.  **User Story: **As a user, I need to be able to edit pre-existing ideas and save them so I can keep my ideas up-to-date

		**Actions: **Users can select the idea in edit mode and change the details


		**Task List:**

14.  **User Story: **As a user I need to be able to dismiss a reminder as no longer relevant and archive it

		**Actions: **This could simply remove the reminder date from WordPress


		**Task List:**

15.  **User Story: **As a user, I need to be able to delete ideas and remove them from the list

		**Actions: **The user can select the delete button and are presented with an alert message before confirming deletion


		**Task List:**

16.  **User Story: **As a user I need to be able to create an idea and have the option to create a reminder date and reminder text

		**Actions: **The user can create a new idea from the ideas page


		**Task List:**

17.  **User Story: **As a user, I need to be able to edit a reminder date and text so I can keep my idea follow-up list up-to-date

		**Actions: **The user can edit all the idea information from the edit page


		**Task List:**

18.  **User Story: **As the user, I need a clear message if an API request has failed and the information is unavailable, so I know what action (if any) I can take

		**Actions: **The app will display a simple 'unavailable - please try again' message


		**Task List:**

19.  **User Story: **As the client, I need to be able to store idea in a remote database, so future ideas around community, sharing and upselling can be realised

		**Actions: **The ideas will be pushed into WordPress and stored in a started Ideas Custom Post Type


		**Task List:**


## Screen Map

[https://docs.google.com/drawings/d/1SXmWfqwXPH4kr-BkzlwhSVQJBFsmTaiF5xr6RmKuswQ/edit](https://docs.google.com/drawings/d/1SXmWfqwXPH4kr-BkzlwhSVQJBFsmTaiF5xr6RmKuswQ/edit)


## Wireframes


## Data Structure

_TBC_


## Risk Register


**Risk: **The app fails to get accepted into the App Store

**Impact Level: **High

**Likelihood: **Low

**Mitigation: **We would expect to be provided with a reason why it had been rejected with clear actions required


**Risk: **The app fails to find traction in the marketplace

**Impact Level: **High

**Likelihood: **Medium

**Mitigation: **This is an untested idea - the low-cost MVP will test the proposition


**Risk: **A competitor releases a similar app

**Impact Level: **Medium

**Likelihood: **Medium

**Mitigation: **We would expect competitors to emerge as the app becomes successful - but rapid iteration would keep us ahead of the competition


**Risk: **A pre-existing app adds the Ideation feature set

**Impact Level: **Medium

**Likelihood: **Medium

**Mitigation: **The single purpose focus and clarity of Ideation would provide an advantage over a bolt-on feature to an existing app


**Risk: **Performance deteriorates as user increase

**Impact Level: **High

**Likelihood: **High

**Mitigation: **The stack would need to scale with usage


**Risk: **Maintenance of two codebases could become challenging over time

**Impact Level: **Low

**Likelihood: **Medium

**Mitigation: **Communications channels need to be clearly established between the client, the agency and app maintenance agency


**Risk: **The app costs more than anticipated

**Impact Level: **Medium

**Likelihood: **Low

**Mitigation: **Ever care has been taken to ensure an accurate cost estimate - but it is just an estimate. We would discuss together any required changes in funding level and agree mitigation


**Risk: **The app developers misunderstand requirements within the documentation

**Impact Level: **Low

**Likelihood: **Low

**Mitigation: **Time will be provided to discuss and clarify this document
