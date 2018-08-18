## **Product Requirements for Ideation App**


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
-----
* _User Story 01:_ As a user, I need to be able to register for Ideation so I start saving ideas
* _Actions:_ Registration will happen on the WordPress site, with a link from within the App
* _Task List:_
1. _Task 1 details_
2. _Task 2 details_
3. _Task 3 details_
4. _Task 4 details_
5. _Task 5 details_
-----
* _User Story 02:_ As a user, I need to add my first and last name on registration, to personalise the app experience
* _Actions:_ (Could have) need to be capture via WordPress registration process
* _Task List:_
-----
* _User Story 03:_ As a user, I need to add my email to the registration process, so I can recover my password (and potentially receive reminder updates in a later iteration)
* _Actions:_ Covered by WordPress registration
* _Task List:_
-----
* _User Story 04:_ As a user, I need to be able to recover my password, so I can resign into my account (or sign in on other devices)
* _Actions:_ A link to the 'lost your password?' functionality within WordPress
* _Task List:_
-----
* _User Story 05:_ As a user, I want to be able to use the app across multiple devices and see my ideas
* _Actions:_ The ideas will be stored within WordPress - with each user as the 'author' of each idea. Nothing is stored locally, so once logged in, the user can see their own ideas (from any device)
* _Task List:_
-----
* _User Story 06:_ *As a user, I want a sync button to update my ideas and synchronize across other devices
* _Actions:_ This can simply trigger a new API call (to update the content)
* _Task List:_
-----
* _User Story 07:_ As a user, I need to be able to login to me account so I can access previously stored ideas
* _Actions:_ The login process is handled within the App (via JWT) - so the user can use the app to login.
* _Task List:_
-----
* _User Story 08:_ As a user, I need clear indication of next actions if my login attempt fails
* _Actions:_ We can flag a failed attempt within the app screen (we are sent an error code via the API)
* _Task List:_
-----
* _User Story 09:_ As a user, after I successfully login I want to stay automatically logged into my account whenever I open the app, so I can quickly record ideas
* _Actions:_ If a pre-existing (and valid) token is found, the user will be logged in automatically
* _Task List:_
-----
* _User Story 10:_ As a user, I want a clear indication of now to create an idea so I don't feel lost on first load
* _Actions:_ If we don't find any ideas, we display a call-to-action message to create an idea
* _Task List:_
-----
* _User Story 11:_ As a user, I need to be able to see a list of my ideas and search via text
* _Actions:_ The App will use the search component to enable text search against ideas
* _Task List:_
-----
* _User Story 12:_ As a user, I need to be able to see my pending and overdue reminders for actions so I can follow-up my ideas
* _Actions:_ The app will list reminders in date order (the most overdue or soonest at the top)
* _Task List:_
-----
* _User Story 13:_ As a user, I need to be able to edit pre-existing ideas and save them so I can keep my ideas up-to-date
* _Actions:_ Users can select the idea in edit mode and change the details
* _Task List:_
-----
* _User Story 14:_ As a user I need to be able to dismiss a reminder as no longer relevant and archive it
* _Actions:_ This could simply remove the reminder date from WordPress
* _Task List:_
-----
* _User Story 15:_ As a user, I need to be able to delete ideas and remove them from the list
* _Actions:_ The user can select the delete button and are presented with an alert message before confirming deletion
* _Task List:_
-----
* _User Story 16:_ As a user I need to be able to create an idea and have the option to create a reminder date and reminder text
* _Actions:_ The user can create a new idea from the ideas page
* _Task List:_
-----
* _User Story 17:_ As a user, I need to be able to edit a reminder date and text so I can keep my idea follow-up list up-to-date
* _Actions:_ The user can edit all the idea information from the edit page
* _Task List:_
-----
* _User Story 18:_ As the user, I need a clear message if an API request has failed and the information is unavailable, so I know what action (if any) I can take
* _Actions:_ The app will display a simple 'unavailable - please try again' message
* _Task List:_
-----
* _User Story 19:_ As the client, I need to be able to store idea in a remote database, so future ideas around community, sharing and upselling can be realised
* _Actions:_ The ideas will be pushed into WordPress and stored in a started Ideas Custom Post Type
* _Task List:_
-----

## Screen Map

[https://docs.google.com/drawings/d/1SXmWfqwXPH4kr-BkzlwhSVQJBFsmTaiF5xr6RmKuswQ/edit](https://docs.google.com/drawings/d/1SXmWfqwXPH4kr-BkzlwhSVQJBFsmTaiF5xr6RmKuswQ/edit)


## Wireframes


## Data Structure

### Resource: **`token`**
#### Sending credentials to receive token
**`POST wp-json/jwt-auth/v1/token`**

##### Body
```json
{
  "username": "idea_manager",
  "password": "password"
}
```

##### Response
```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvd2NidG4yMDE4LmxvY2FsaG9zdCIsImlhdCI6MTUzNDU0ODI1MCwibmJmIjoxNTM0NTQ4MjUwLCJleHAiOjE1MzUxNTMwNTAsImRhdGEiOnsidXNlciI6eyJpZCI6IjIifX19.K4h39bfmfNyg7lb-_jd8JVTYqzPJceP86k8-zaRZfZU",
  "user_email": "idea_manager@gmail.com",
  "user_nicename": "idea_manager",
  "user_display_name": "Idea Manager",
  "user_id": "2"
}
```
---
### Resource: **`ideas`**
#### Getting all ideas for a given author
**`GET /wp-json/wp/v2/ideas?_embed&author=:user_id`**

##### Response
```json
[  
  {  
    "id": 21,
    "date": "2018-08-15T10:39:11",
    "date_gmt": "2018-08-15T10:39:11",
    "guid": {  
      "rendered": "https:\/\/wcbtn2018.localhost\/idea\/test-idea\/"
    },
    "modified": "2018-08-15T10:39:11",
    "modified_gmt": "2018-08-15T10:39:11",
    "slug": "test-idea",
    "status": "publish",
    "type": "idea",
    "link": "https:\/\/wcbtn2018.localhost\/idea\/test-idea\/",
    "title": {  
      "rendered": "My first test idea"
    },
    "content": {  
      "rendered": "",
      "protected": false
    },
    "author": 2,
    "featured_media": 0,
    "template": "",
    "meta": [],
    "reminder_content": "The next action to take",
    "reminder_date": "1534723200000",
    "_links": {  
      "self": [  
        {  
          "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/ideas\/21"
        }
      ],
      "collection": [  
        {  
          "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/ideas"
        }
      ],
      "about": [  
        {  
          "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/types\/idea"
        }
      ],
      "author": [  
        {  
          "embeddable": true,
          "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/users\/2"
        }
      ],
      "wp:attachment": [  
        {  
          "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/media?parent=21"
        }
      ],
      "curies": [  
        {  
          "name": "wp",
          "href": "https:\/\/api.w.org\/{rel}",
          "templated": true
        }
      ]
    },
    "_embedded": {  
      "author": [  
        {  
          "id": 2,
          "name": "Idea Manager",
          "url": "",
          "description": "",
          "link": "https:\/\/wcbtn2018.localhost\/author\/idea_manager\/",
          "slug": "idea_manager",
          "avatar_urls": {  
            "24": "https:\/\/secure.gravatar.com\/avatar\/47db0b55b9e211cdfa867031f08aba53?s=24&d=mm&r=g",
            "48": "https:\/\/secure.gravatar.com\/avatar\/47db0b55b9e211cdfa867031f08aba53?s=48&d=mm&r=g",
            "96": "https:\/\/secure.gravatar.com\/avatar\/47db0b55b9e211cdfa867031f08aba53?s=96&d=mm&r=g"
          },
          "_links": {  
            "self": [  
              {  
                "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/users\/2"
              }
            ],
            "collection": [  
              {  
                "href": "https:\/\/wcbtn2018.localhost\/wp-json\/wp\/v2\/users"
              }
            ]
          }
        }
      ]
    }
  }
]
```
---
#### Modifying a specific idea
**`PUT /wp-json/wp/v2/ideas/:id`**

##### Body
Fields to be modified and their modified content.
```json
{
  "title": "My first test idea",
  "reminder_content": "The next action to take",
  "reminder_date": 1534723200000,
  "status": "publish"
}
```
##### Response
(modified idea data)
---
#### Deleting a specific idea
**`DELETE /wp-json/wp/v2/ideas/:id`**

##### Response
(deleted idea data)

## Risk Register
-----
* _Risk:_ The app fails to get accepted into the App Store
* _Impact Level:_ High
* _Likelihood:_ Low
* _Mitigation:_ We would expect to be provided with a reason why it had been rejected with clear actions required
-----
* _Risk: _ The app fails to find traction in the marketplace
* _Impact Level:_ High
* _Likelihood:_ Medium
* _Mitigation:_ This is an untested idea - the low-cost MVP will test the proposition
-----
* _Risk:_ A competitor releases a similar app
* _Impact Level:_ Medium
* _Likelihood:_ Medium
* _Mitigation:_ We would expect competitors to emerge as the app becomes successful - but rapid iteration would keep us ahead of the competition
-----
* _Risk:_ A pre-existing app adds the Ideation feature set
* _Impact Level:_ Medium
* _Likelihood:_ Medium
* _Mitigation:_ The single purpose focus and clarity of Ideation would provide an advantage over a bolt-on feature to an existing app
-----
* _Risk:_ Performance deteriorates as user increase
* _Impact Level:_ High
* _Likelihood:_ High
* _Mitigation:_ The stack would need to scale with usage
-----
* _Risk:_ Maintenance of two codebases could become challenging over time
* _Impact Level:_ Low
* _Likelihood:_ Medium
* _Mitigation:_ Communications channels need to be clearly established between the client, the agency and app maintenance agency
-----
* _Risk:_ The app costs more than anticipated
* _Impact Level:_ Medium
* _Likelihood:_ Low
* _Mitigation:_ Ever care has been taken to ensure an accurate cost estimate - but it is just an estimate. We would discuss together any required changes in funding level and agree mitigation
-----
* _Risk:_ The app developers misunderstand requirements within the documentation
* _Impact Level:_ Low
* _Likelihood:_ Low
* _Mitigation:_ Time will be provided to discuss and clarify this document
-----
