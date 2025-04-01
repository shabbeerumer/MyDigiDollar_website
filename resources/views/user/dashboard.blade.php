@php
use App\Models\WithdrawRequest;
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>My DigiDollar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* /* styles.css */
        /* Navbar Styling */
        /* #img {
   background-image: url(img/tt.webp);
   background-position: center;
   background-size: cover;
   background-repeat: no-repeat;
   width: 100%;
   height: 100vh;
  } */

        .main_content.dashboard_part.back.img {
            background-image: url(img/tt.webp);
            /* Replace 'your-image-path.jpg' with the path to your image */
            background-size: cover;
            /* Ensures the image covers the entire area */
            background-position: center;
            /* Centers the image */
            background-repeat: no-repeat;
            /* Prevents the image from repeating */
        }

        .navbar {
            background-color: darkslategrey !important;
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #05b620 !important;
        }

        .btn-success {
            background-color: #05b620;
            border-color: #05b620;
        }

        .btn-outline-light {
            color: white;
            border-color: white;
        }

        .btn-outline-light:hover {
            background-color: white;
            color: #05b620;
        }

        /* Gradient Section */
        .first {
            background-image: linear-gradient(90deg, rgba(153, 188, 237, .2), rgba(153, 248, 207, .5), rgba(255, 214, 199, .5));
            padding: 23px;
        }


        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9fb;
            color: #333;
        }

        .header {
            background-color: #1e3a8a;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .menu {
            list-style: none;
            display: flex;
            gap: 1rem;
            margin: 0;
            padding: 0;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a:hover {
            text-decoration: underline;
        }

        .main {
            padding: 2rem;
        }

        .balance-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .balance-card {
            background-color: #4ade80;
            color: white;
            border-radius: 10px;
            padding: 1rem;
            font-size: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .action-button {
            padding: 0.7rem 1.5rem;
            font-size: 1rem;
            color: white;
            background-color: #2563eb;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #1d4ed8;
        }

        .packages-section {
            text-align: center;
        }

        .packages-list {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }

        .package-card {
            background-color: #e5e7eb;
            border-radius: 10px;
            padding: 1rem;
            width: 200px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .package-card h3 {
            margin: 0;
        }

        .footer {
            background-color: #1e3a8a;
            color: white;
            text-align: center;
            padding: 1rem;
        }












        /* @charset "UTF-8"; */
        /*!
 * Bootstrap v5.0.2 (https://getbootstrap.com/)
 * Copyright 2011-2021 The Bootstrap Authors
 * Copyright 2011-2021 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/main/LICENSE)
 */

        :root {
            --bs-blue: #0d6efd;
            --bs-indigo: #6610f2;
            --bs-purple: #6f42c1;
            --bs-pink: #d63384;
            --bs-red: #dc3545;
            --bs-orange: #fd7e14;
            --bs-yellow: #ffc107;
            --bs-green: #198754;
            --bs-teal: #20c997;
            --bs-cyan: #0dcaf0;
            --bs-white: #fff;
            --bs-gray: #6c757d;
            --bs-gray-dark: #343a40;
            --bs-primary: #0d6efd;
            --bs-secondary: #6c757d;
            --bs-success: #198754;
            --bs-info: #0dcaf0;
            --bs-warning: #ffc107;
            --bs-danger: #dc3545;
            --bs-light: #f8f9fa;
            --bs-dark: #212529;
            --bs-font-sans-serif: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            --bs-font-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0))
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box
        }

        @media (prefers-reduced-motion:no-preference) {
            :root {
                scroll-behavior: smooth
            }
        }

        body {
            margin: 0;
            font-family: var(--bs-font-sans-serif);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent
        }

        hr {
            margin: 1rem 0;
            color: inherit;
            background-color: currentColor;
            border: 0;
            opacity: .25
        }

        hr:not([size]) {
            height: 1px
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin-top: 0;
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2
        }

        .h1,
        h1 {
            font-size: calc(1.375rem + 1.5vw)
        }

        @media (min-width:1200px) {

            .h1,
            h1 {
                font-size: 2.5rem
            }
        }

        .h2,
        h2 {
            font-size: calc(1.325rem + .9vw)
        }

        @media (min-width:1200px) {

            .h2,
            h2 {
                font-size: 2rem
            }
        }

        .h3,
        h3 {
            font-size: calc(1.3rem + .6vw)
        }

        @media (min-width:1200px) {

            .h3,
            h3 {
                font-size: 1.75rem
            }
        }

        .h4,
        h4 {
            font-size: calc(1.275rem + .3vw)
        }

        @media (min-width:1200px) {

            .h4,
            h4 {
                font-size: 1.5rem
            }
        }

        .h5,
        h5 {
            font-size: 1.25rem
        }

        .h6,
        h6 {
            font-size: 1rem
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem
        }

        abbr[data-bs-original-title],
        abbr[title] {
            -webkit-text-decoration: underline dotted;
            text-decoration: underline dotted;
            cursor: help;
            -webkit-text-decoration-skip-ink: none;
            text-decoration-skip-ink: none
        }

        address {
            margin-bottom: 1rem;
            font-style: normal;
            line-height: inherit
        }

        /* ol,
        ul {
            padding-left: 2rem
        } */

        dl,
        ol,
        ul {
            margin-top: 0 !important;
            margin-bottom: 1 !important;
            padding: 0% !important;
        }

        ol ol,
        ol ul,
        ul ol,
        ul ul {
            margin-bottom: 0
        }

        dt {
            font-weight: 700
        }

        dd {
            margin-bottom: .5rem;
            margin-left: 0
        }

        blockquote {
            margin: 0 0 1rem
        }

        b,
        strong {
            font-weight: bolder
        }

        .small,
        small {
            font-size: .875em
        }

        .mark,
        mark {
            padding: .2em;
            background-color: #fcf8e3
        }

        sub,
        sup {
            position: relative;
            font-size: .75em;
            line-height: 0;
            vertical-align: baseline
        }

        sub {
            bottom: -.25em
        }

        sup {
            top: -.5em
        }

        a {
            color: #0d6efd;
            text-decoration: underline
        }

        a:hover {
            color: #0a58ca
        }

        a:not([href]):not([class]),
        a:not([href]):not([class]):hover {
            color: inherit;
            text-decoration: none
        }

        code,
        kbd,
        pre,
        samp {
            font-family: var(--bs-font-monospace);
            font-size: 1em;
            direction: ltr;
            unicode-bidi: bidi-override
        }

        pre {
            display: block;
            margin-top: 0;
            margin-bottom: 1rem;
            overflow: auto;
            font-size: .875em
        }

        pre code {
            font-size: inherit;
            color: inherit;
            word-break: normal
        }

        code {
            font-size: .875em;
            color: #d63384;
            word-wrap: break-word
        }

        a>code {
            color: inherit
        }

        kbd {
            padding: .2rem .4rem;
            font-size: .875em;
            color: #fff;
            background-color: #212529;
            border-radius: .2rem
        }

        kbd kbd {
            padding: 0;
            font-size: 1em;
            font-weight: 700
        }

        figure {
            margin: 0 0 1rem
        }

        img,
        svg {
            vertical-align: middle
        }

        table {
            caption-side: bottom;
            border-collapse: collapse
        }

        caption {
            padding-top: .5rem;
            padding-bottom: .5rem;
            color: #6c757d;
            text-align: left
        }

        th {
            text-align: inherit;
            text-align: -webkit-match-parent
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-style: solid;
            border-width: 0
        }

        label {
            display: inline-block
        }

        button {
            border-radius: 0
        }

        button:focus:not(:focus-visible) {
            outline: 0
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            margin: 0;
            font-family: inherit;
            font-size: inherit;
            line-height: inherit
        }

        button,
        select {
            text-transform: none
        }

        [role=button] {
            cursor: pointer
        }

        select {
            word-wrap: normal
        }

        select:disabled {
            opacity: 1
        }

        [list]::-webkit-calendar-picker-indicator {
            display: none
        }

        [type=button],
        [type=reset],
        [type=submit],
        button {
            -webkit-appearance: button
        }

        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        [type=submit]:not(:disabled),
        button:not(:disabled) {
            cursor: pointer
        }

        ::-moz-focus-inner {
            padding: 0;
            border-style: none
        }

        textarea {
            resize: vertical
        }

        fieldset {
            min-width: 0;
            padding: 0;
            margin: 0;
            border: 0
        }

        legend {
            float: left;
            width: 100%;
            padding: 0;
            margin-bottom: .5rem;
            font-size: calc(1.275rem + .3vw);
            line-height: inherit
        }

        @media (min-width:1200px) {
            legend {
                font-size: 1.5rem
            }
        }

        legend+* {
            clear: left
        }

        ::-webkit-datetime-edit-day-field,
        ::-webkit-datetime-edit-fields-wrapper,
        ::-webkit-datetime-edit-hour-field,
        ::-webkit-datetime-edit-minute,
        ::-webkit-datetime-edit-month-field,
        ::-webkit-datetime-edit-text,
        ::-webkit-datetime-edit-year-field {
            padding: 0
        }

        ::-webkit-inner-spin-button {
            height: auto
        }

        [type=search] {
            outline-offset: -2px;
            -webkit-appearance: textfield
        }

        ::-webkit-search-decoration {
            -webkit-appearance: none
        }

        ::-webkit-color-swatch-wrapper {
            padding: 0
        }

        ::file-selector-button {
            font: inherit
        }

        ::-webkit-file-upload-button {
            font: inherit;
            -webkit-appearance: button
        }

        output {
            display: inline-block
        }

        iframe {
            border: 0
        }

        summary {
            display: list-item;
            cursor: pointer
        }

        progress {
            vertical-align: baseline
        }

        [hidden] {
            display: none !important
        }

        .lead {
            font-size: 1.25rem;
            font-weight: 300
        }

        .display-1 {
            font-size: calc(1.625rem + 4.5vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-1 {
                font-size: 5rem
            }
        }

        .display-2 {
            font-size: calc(1.575rem + 3.9vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-2 {
                font-size: 4.5rem
            }
        }

        .display-3 {
            font-size: calc(1.525rem + 3.3vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-3 {
                font-size: 4rem
            }
        }

        .display-4 {
            font-size: calc(1.475rem + 2.7vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-4 {
                font-size: 3.5rem
            }
        }

        .display-5 {
            font-size: calc(1.425rem + 2.1vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-5 {
                font-size: 3rem
            }
        }

        .display-6 {
            font-size: calc(1.375rem + 1.5vw);
            font-weight: 300;
            line-height: 1.2
        }

        @media (min-width:1200px) {
            .display-6 {
                font-size: 2.5rem
            }
        }

        .list-unstyled {
            padding-left: 0;
            list-style: none
        }

        .list-inline {
            padding-left: 0;
            list-style: none
        }

        .list-inline-item {
            display: inline-block
        }

        .list-inline-item:not(:last-child) {
            margin-right: .5rem
        }

        .initialism {
            font-size: .875em;
            text-transform: uppercase
        }

        .blockquote {
            margin-bottom: 1rem;
            font-size: 1.25rem
        }

        .blockquote>:last-child {
            margin-bottom: 0
        }

        .blockquote-footer {
            margin-top: -1rem;
            margin-bottom: 1rem;
            font-size: .875em;
            color: #6c757d
        }

        .blockquote-footer::before {
            content: "— "
        }

        .img-fluid {
            max-width: 100%;
            height: auto
        }

        .img-thumbnail {
            padding: .25rem;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            max-width: 100%;
            height: auto
        }

        .figure {
            display: inline-block
        }

        .figure-img {
            margin-bottom: .5rem;
            line-height: 1
        }

        .figure-caption {
            font-size: .875em;
            color: #6c757d
        }

        .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            width: 100%;
            padding-right: var(--bs-gutter-x, .75rem);
            padding-left: var(--bs-gutter-x, .75rem);
            margin-right: auto;
            margin-left: auto
        }

        @media (min-width:576px) {

            .container,
            .container-sm {
                max-width: 540px
            }
        }

        @media (min-width:768px) {

            .container,
            .container-md,
            .container-sm {
                max-width: 720px
            }
        }

        @media (min-width:992px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm {
                max-width: 960px
            }
        }

        @media (min-width:1200px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl {
                max-width: 1140px
            }
        }

        @media (min-width:1400px) {

            .container,
            .container-lg,
            .container-md,
            .container-sm,
            .container-xl,
            .container-xxl {
                max-width: 1320px
            }
        }

        .row {
            --bs-gutter-x: 1.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.5);
            margin-left: calc(var(--bs-gutter-x) * -.5)
        }

        .row>* {
            flex-shrink: 0;
            width: 100%;
            max-width: 100%;
            padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);
            margin-top: var(--bs-gutter-y)
        }

        .col {
            flex: 1 0 0%
        }

        .row-cols-auto>* {
            flex: 0 0 auto;
            width: auto
        }

        .row-cols-1>* {
            flex: 0 0 auto;
            width: 100%
        }

        .row-cols-2>* {
            flex: 0 0 auto;
            width: 50%
        }

        .row-cols-3>* {
            flex: 0 0 auto;
            width: 33.3333333333%
        }

        .row-cols-4>* {
            flex: 0 0 auto;
            width: 25%
        }

        .row-cols-5>* {
            flex: 0 0 auto;
            width: 20%
        }

        .row-cols-6>* {
            flex: 0 0 auto;
            width: 16.6666666667%
        }

        @media (min-width:576px) {
            .col-sm {
                flex: 1 0 0%
            }

            .row-cols-sm-auto>* {
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-sm-1>* {
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-sm-2>* {
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-sm-3>* {
                flex: 0 0 auto;
                width: 33.3333333333%
            }

            .row-cols-sm-4>* {
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-sm-5>* {
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-sm-6>* {
                flex: 0 0 auto;
                width: 16.6666666667%
            }
        }

        .g-sm-3,
        .gy-sm-3 {
            --bs-gutter-y: 1rem
        }

        .g-sm-4,
        .gx-sm-4 {
            --bs-gutter-x: 1.5rem
        }

        .g-sm-4,
        .gy-sm-4 {
            --bs-gutter-y: 1.5rem
        }

        .g-sm-5,
        .gx-sm-5 {
            --bs-gutter-x: 3rem
        }

        .g-sm-5,
        .gy-sm-5 {
            --bs-gutter-y: 3rem
        }


        @media (min-width:768px) {
            .col-md-auto {
                flex: 0 0 auto;
                width: auto
            }

            .col-md-1 {
                flex: 0 0 auto;
                width: 8.33333333%
            }

            .col-md-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }

            .col-md-3 {
                flex: 0 0 auto;
                width: 25%
            }

            .col-md-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }

            .col-md-5 {
                flex: 0 0 auto;
                width: 41.66666667%
            }

            .col-md-6 {
                flex: 0 0 auto;
                width: 50%
            }

            .col-md-7 {
                flex: 0 0 auto;
                width: 58.33333333%
            }

            .col-md-8 {
                flex: 0 0 auto;
                width: 66.66666667%
            }

            .col-md-9 {
                flex: 0 0 auto;
                width: 75%
            }

            .col-md-10 {
                flex: 0 0 auto;
                width: 83.33333333%
            }

            .col-md-11 {
                flex: 0 0 auto;
                width: 91.66666667%
            }

            .col-md-12 {
                flex: 0 0 auto;
                width: 100%
            }

            .offset-md-0 {
                margin-left: 0
            }

            .offset-md-1 {
                margin-left: 8.33333333%
            }

            .offset-md-2 {
                margin-left: 16.66666667%
            }

            .offset-md-3 {
                margin-left: 25%
            }

            .offset-md-4 {
                margin-left: 33.33333333%
            }

            .offset-md-5 {
                margin-left: 41.66666667%
            }

            .offset-md-6 {
                margin-left: 50%
            }

            .offset-md-7 {
                margin-left: 58.33333333%
            }

            .offset-md-8 {
                margin-left: 66.66666667%
            }

            .offset-md-9 {
                margin-left: 75%
            }

            .offset-md-10 {
                margin-left: 83.33333333%
            }

            .offset-md-11 {
                margin-left: 91.66666667%
            }

            .g-md-0,
            .gx-md-0 {
                --bs-gutter-x: 0
            }

            .g-md-0,
            .gy-md-0 {
                --bs-gutter-y: 0
            }

            .g-md-1,
            .gx-md-1 {
                --bs-gutter-x: 0.25rem
            }

            .g-md-1,
            .gy-md-1 {
                --bs-gutter-y: 0.25rem
            }

            .g-md-2,
            .gx-md-2 {
                --bs-gutter-x: 0.5rem
            }

            .g-md-2,
            .gy-md-2 {
                --bs-gutter-y: 0.5rem
            }

            .g-md-3,
            .gx-md-3 {
                --bs-gutter-x: 1rem
            }

            .g-md-3,
            .gy-md-3 {
                --bs-gutter-y: 1rem
            }

            .g-md-4,
            .gx-md-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-md-4,
            .gy-md-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-md-5,
            .gx-md-5 {
                --bs-gutter-x: 3rem
            }

            .g-md-5,
            .gy-md-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width:992px) {
            .col-lg-auto {
                flex: 0 0 auto;
                width: auto
            }

            .col-lg-1 {
                flex: 0 0 auto;
                width: 8.33333333%
            }

            .col-lg-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }

            .col-lg-3 {
                flex: 0 0 auto;
                width: 25%
            }

            .col-lg-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }

            .col-lg-5 {
                flex: 0 0 auto;
                width: 41.66666667%
            }

            .col-lg-6 {
                flex: 0 0 auto;
                width: 50%
            }

            .col-lg-7 {
                flex: 0 0 auto;
                width: 58.33333333%
            }

            .col-lg-8 {
                flex: 0 0 auto;
                width: 66.66666667%
            }

            .col-lg-9 {
                flex: 0 0 auto;
                width: 75%
            }

            .col-lg-10 {
                flex: 0 0 auto;
                width: 83.33333333%
            }

            .col-lg-11 {
                flex: 0 0 auto;
                width: 91.66666667%
            }

            .col-lg-12 {
                flex: 0 0 auto;
                width: 100%
            }

            .offset-lg-0 {
                margin-left: 0
            }

            .offset-lg-1 {
                margin-left: 8.33333333%
            }

            .offset-lg-2 {
                margin-left: 16.66666667%
            }

            .offset-lg-3 {
                margin-left: 25%
            }

            .offset-lg-4 {
                margin-left: 33.33333333%
            }

            .offset-lg-5 {
                margin-left: 41.66666667%
            }

            .offset-lg-6 {
                margin-left: 50%
            }

            .offset-lg-7 {
                margin-left: 58.33333333%
            }

            .offset-lg-8 {
                margin-left: 66.66666667%
            }

            .offset-lg-9 {
                margin-left: 75%
            }

            .offset-lg-10 {
                margin-left: 83.33333333%
            }

            .offset-lg-11 {
                margin-left: 91.66666667%
            }

            .g-lg-0,
            .gx-lg-0 {
                --bs-gutter-x: 0
            }

            .g-lg-0,
            .gy-lg-0 {
                --bs-gutter-y: 0
            }

            .g-lg-1,
            .gx-lg-1 {
                --bs-gutter-x: 0.25rem
            }

            .g-lg-1,
            .gy-lg-1 {
                --bs-gutter-y: 0.25rem
            }

            .g-lg-2,
            .gx-lg-2 {
                --bs-gutter-x: 0.5rem
            }

            .g-lg-2,
            .gy-lg-2 {
                --bs-gutter-y: 0.5rem
            }

            .g-lg-3,
            .gx-lg-3 {
                --bs-gutter-x: 1rem
            }

            .g-lg-3,
            .gy-lg-3 {
                --bs-gutter-y: 1rem
            }

            .g-lg-4,
            .gx-lg-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-lg-4,
            .gy-lg-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-lg-5,
            .gx-lg-5 {
                --bs-gutter-x: 3rem
            }

            .g-lg-5,
            .gy-lg-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width:1200px) {
            .col-xl-auto {
                flex: 0 0 auto;
                width: auto
            }

            .col-xl-1 {
                flex: 0 0 auto;
                width: 8.33333333%
            }

            .col-xl-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }

            .col-xl-3 {
                flex: 0 0 auto;
                width: 25%
            }

            .col-xl-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }

            .col-xl-5 {
                flex: 0 0 auto;
                width: 41.66666667%
            }

            .col-xl-6 {
                flex: 0 0 auto;
                width: 50%
            }

            .col-xl-7 {
                flex: 0 0 auto;
                width: 58.33333333%
            }

            .col-xl-8 {
                flex: 0 0 auto;
                width: 66.66666667%
            }

            .col-xl-9 {
                flex: 0 0 auto;
                width: 75%
            }

            .col-xl-10 {
                flex: 0 0 auto;
                width: 83.33333333%
            }

            .col-xl-11 {
                flex: 0 0 auto;
                width: 91.66666667%
            }

            .col-xl-12 {
                flex: 0 0 auto;
                width: 100%
            }

            .offset-xl-0 {
                margin-left: 0
            }

            .offset-xl-1 {
                margin-left: 8.33333333%
            }

            .offset-xl-2 {
                margin-left: 16.66666667%
            }

            .offset-xl-3 {
                margin-left: 25%
            }

            .offset-xl-4 {
                margin-left: 33.33333333%
            }

            .offset-xl-5 {
                margin-left: 41.66666667%
            }

            .offset-xl-6 {
                margin-left: 50%
            }

            .offset-xl-7 {
                margin-left: 58.33333333%
            }

            .offset-xl-8 {
                margin-left: 66.66666667%
            }

            .offset-xl-9 {
                margin-left: 75%
            }

            .offset-xl-10 {
                margin-left: 83.33333333%
            }

            .offset-xl-11 {
                margin-left: 91.66666667%
            }

            .g-xl-0,
            .gx-xl-0 {
                --bs-gutter-x: 0
            }

            .g-xl-0,
            .gy-xl-0 {
                --bs-gutter-y: 0
            }

            .g-xl-1,
            .gx-xl-1 {
                --bs-gutter-x: 0.25rem
            }

            .g-xl-1,
            .gy-xl-1 {
                --bs-gutter-y: 0.25rem
            }

            .g-xl-2,
            .gx-xl-2 {
                --bs-gutter-x: 0.5rem
            }

            .g-xl-2,
            .gy-xl-2 {
                --bs-gutter-y: 0.5rem
            }

            .g-xl-3,
            .gx-xl-3 {
                --bs-gutter-x: 1rem
            }

            .g-xl-3,
            .gy-xl-3 {
                --bs-gutter-y: 1rem
            }

            .g-xl-4,
            .gx-xl-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-xl-4,
            .gy-xl-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-xl-5,
            .gx-xl-5 {
                --bs-gutter-x: 3rem
            }

            .g-xl-5,
            .gy-xl-5 {
                --bs-gutter-y: 3rem
            }
        }

        @media (min-width:1400px) {
            .col-xxl-auto {
                flex: 0 0 auto;
                width: auto
            }

            .col-xxl-1 {
                flex: 0 0 auto;
                width: 8.33333333%
            }

            .col-xxl-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }

            .col-xxl-3 {
                flex: 0 0 auto;
                width: 25%
            }

            .col-xxl-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }

            .col-xxl-5 {
                flex: 0 0 auto;
                width: 41.66666667%
            }

            .col-xxl-6 {
                flex: 0 0 auto;
                width: 50%
            }

            .col-xxl-7 {
                flex: 0 0 auto;
                width: 58.33333333%
            }

            .col-xxl-8 {
                flex: 0 0 auto;
                width: 66.66666667%
            }

            .col-xxl-9 {
                flex: 0 0 auto;
                width: 75%
            }

            .col-xxl-10 {
                flex: 0 0 auto;
                width: 83.33333333%
            }

            .col-xxl-11 {
                flex: 0 0 auto;
                width: 91.66666667%
            }

            .col-xxl-12 {
                flex: 0 0 auto;
                width: 100%
            }

            .offset-xxl-0 {
                margin-left: 0
            }

            .offset-xxl-1 {
                margin-left: 8.33333333%
            }

            .offset-xxl-2 {
                margin-left: 16.66666667%
            }

            .offset-xxl-3 {
                margin-left: 25%
            }

            .offset-xxl-4 {
                margin-left: 33.33333333%
            }

            .offset-xxl-5 {
                margin-left: 41.66666667%
            }

            .offset-xxl-6 {
                margin-left: 50%
            }

            .offset-xxl-7 {
                margin-left: 58.33333333%
            }

            .offset-xxl-8 {
                margin-left: 66.66666667%
            }

            .offset-xxl-9 {
                margin-left: 75%
            }

            .offset-xxl-10 {
                margin-left: 83.33333333%
            }

            .offset-xxl-11 {
                margin-left: 91.66666667%
            }

            .g-xxl-0,
            .gx-xxl-0 {
                --bs-gutter-x: 0
            }

            .g-xxl-0,
            .gy-xxl-0 {
                --bs-gutter-y: 0
            }

            .g-xxl-1,
            .gx-xxl-1 {
                --bs-gutter-x: 0.25rem
            }

            .g-xxl-1,
            .gy-xxl-1 {
                --bs-gutter-y: 0.25rem
            }

            .g-xxl-2,
            .gx-xxl-2 {
                --bs-gutter-x: 0.5rem
            }

            .g-xxl-2,
            .gy-xxl-2 {
                --bs-gutter-y: 0.5rem
            }

            .g-xxl-3,
            .gx-xxl-3 {
                --bs-gutter-x: 1rem
            }

            .g-xxl-3,
            .gy-xxl-3 {
                --bs-gutter-y: 1rem
            }

            .g-xxl-4,
            .gx-xxl-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-xxl-4,
            .gy-xxl-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-xxl-5,
            .gx-xxl-5 {
                --bs-gutter-x: 3rem
            }

            .g-xxl-5,
            .gy-xxl-5 {
                --bs-gutter-y: 3rem
            }
        }




        .single_quick_activity {

            padding: 20px;
            border-radius: 10px;
            /* Optional: for rounded corners */

            text-align: center;
            margin-bottom: 20px;
        }

        .single_quick_activity:nth-child(1) {
            background-color: green;
            /* Light red */
        }



        .packs {
            background-color: #212529;
            height: 150px;
            border-radius: 10px;
            border: solid green 2px;
        }

        .packs button {
            font-weight: bold;
        }

        .pack button {
            font-weight: bold;
        }

        .pack {
            background-color: #212529;
            height: 150px;
            border-radius: 10px;
            border: solid green 2px;
        }

        .button-section {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .btn-primary {
            background-color: #ff5733;
            border-color: #ff5733;
            padding: 10px 30px;
            font-size: 1rem;
        }

        .back {
            background-image: url(https://mydigidollar.com/wp-content/uploads/2024/12/tt-1-scaled.webp);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            width: 100%;
        }

        /* Ensure the icons stack in one row on smaller screens */
        @media (max-width: 576px) {
            .icon-container {
                flex: 1 1 100%;
                margin-bottom: 10px;
            }
        }






        .wallet-footer {
            display: flex;
            /* Enables row layout */
            justify-content: space-between;
            /* Distributes space between items */
            align-items: center;
            /* Aligns items vertically centered */
        }

        .item {
            display: flex;
            flex-direction: column;
            /* Aligns the icon and text vertically */
            justify-content: center;
            align-items: center;
            /* Center the icon and text */
            text-align: center;
            width: 20%;
            /* Adjust width as needed */
        }

        .item a {
            text-decoration: none;
            /* Removes underline from links */
            color: inherit;
            /* Inherit color from parent */
        }

        .icon-wrapper {
            padding: 10px;
            border-radius: 50%;
        }

        .icon-wrapper ion-icon {
            font-size: 24px;
            /* Adjust the icon size */
        }









        /* Center the row */
        .center {
            display: flex;
            justify-content: center;
            /* Horizontally center the items */
            align-items: center;
            /* Vertically center the items */
            width: 100%;
            /* Ensure the row takes up the full width */
        }

        .slider-container {
            width: 80%;
            max-width: 800px;
            position: relative;
            overflow: hidden;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 400px;
        }

        .image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image.right {
            clip-path: inset(0 0 0 50%);
        }

        .slider-bar {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 4px;
            background-color: #fff;
            cursor: ew-resize;
            z-index: 2;
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .arrow {
            width: 20px;
            height: 20px;
            border-left: 4px solid #fff;
            border-top: 4px solid #fff;
            transform: rotate(0deg);
            margin-top: -10px;
            margin-left: -10px;
            animation: bounce 1s infinite;
        }

        .icon-container {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            background-color: #f4f4f4;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .icon-container:hover {
            transform: scale(1.05);
            background-color: #eaeaea;
        }

        .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #007bff;
        }

        .label {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 576px) {
            .col-6 {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body class="crm_body_bg" style="background-color: rgb(30, 29, 29);">


    {{-- <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('webpage') }}" style="color: #05b620;">
                    <b>ℳ𝓎𝒟𝒾ℊ𝒾𝒟ℴ𝓁𝓁𝒶𝓇</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="gap: 32px;">
                        @if (Auth::user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('admin.cards') }}" style="color: white;">Admin
                                    Dashboard</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link active" href={{ route('dashboard') }} style="color: white;">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}" style="color: white;">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}" style="color: white;">Contact Us</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" style="color: white;">Logout</a>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header> --}}
    @extends('layouts.layout')

    @section('content')




    <section class="main_content dashboard_part.back.img">

        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="search_inner">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid plr_30 body_white_bg pt_30">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="single_elezment">
                            <div class="quick_activity">
                                
                           
                                <div class="row" style="margin-top: 20px;">
                                    @if ($userRequests->contains('status', 'approved'))
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity p-5" style="color: white;">
                                                <h4>Total Earning</h4>
                                                <h3>
                                                    {{-- $ {{ 
                                                        $totalDailyEarning  + 
                                                        ($referralEarnings ?? 0) + 
                                                        (Auth::user()->has_received_bonus ? 5 : 0) 
                                                        - 
                                                        (
                                                            WithdrawRequest::where('user_id', Auth::id())
                                                            ->where('status', 'approved')
                                                            ->where('is_processed', true)
                                                            ->sum('withdraw_amount'))
                                                    }} --}}
                                                    $ {{ 
                                                        max(0, 
                                                            $totalDailyEarning + 
                                                            ($referralEarnings ?? 0) + 
                                                            (Auth::user()->has_received_bonus ? 5 : 0) - 
                                                            (WithdrawRequest::where('user_id', Auth::id())
                                                                ->where('status', 'approved')
                                                                ->where('is_processed', true)
                                                                ->sum('withdraw_amount')
                                                            )
                                                        )
                                                    }}
                                                  
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity p-5" style="color: white;">
                                                <h4>Total Investment</h4>
                                                <h3>
                                                    $ {{ $userRequests->where('status', 'approved')->sum('deposit_amount') }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity p-4" style="color: white; height: 90%;">
                                                <h4>Active Plans</h4>
                                                @forelse ($userPackages as $package)
                                                    <h4>{{ $package->package_name }} - ${{ $package->price }}</h4>
                                                @empty
                                                    <h3>No Active Plans</h3>
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity p-5" style="color: white;">
                                                <h4>Withdraw</h4>
                                                <h3>$ {{ $withdrawRequests->sum('withdraw_amount') }}</h3>
                                            </div>
                                        </div>
                                    @elseif ($userRequests->contains('status', 'pending'))
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Total Earning</h4>
                                                <h3>$ {{$user->wallet_balance ?? '0'}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Total Investment</h4>
                                                <h3>$ 0.0</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Active Plans</h4>
                                                <h3>$ 0.0</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Withdraw</h4>
                                                <h3>$ {{ $withdrawRequests->sum('withdraw_amount') }}</h3>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Total Earning</h4>
                                                <h3>$ {{$user->wallet_balance ?? '0'}}</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Total Investment</h4>
                                                <h3>$ 0.0</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Active Plans</h4>
                                                <h3>$ 0.0</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-12 active">
                                            <div class="single_quick_activity" style="color: white;">
                                                <h4>Withdraw</h4>
                                                <h3>$ {{ $withdrawRequests->sum('withdraw_amount') }}</h3>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>

        <section>
            <div class="container"
                style="background-color: #212529; border-radius: 10px; border: solid greenyellow 1px; padding: 10px;">
                <div class="wallet-card">
                    <div class="wallet-footer">
                        <div class="item">
                            <a href=
                             {{route('depositeone')}}
							>
                                <div class="shadow icon-wrapper bg--primary">
                                    <i class="fa-solid fa-up-long"
                                        style="color: white; background-color: green; padding: 14px; border-radius: 6px;"></i>
                                </div>
                                <strong style="color: green;">Deposit</strong>
                            </a>
                        </div>
                        <div class="item">
                            <a href=
							 {{route('withdraw')}}							>
                                <div class="shadow icon-wrapper bg--primary">
                                    <i class="fa-solid fa-down-long"
                                        style="color: white; background-color: green; padding: 14px; border-radius: 6px;"></i>
                                </div>
                                <strong style="color: green;">Withdraw</strong>
                            </a>
                        </div>
                        <div class="item">
                            <a href={{route('refarrel')}}
							>
                                <div class="shadow icon-wrapper bg--primary">
                                    <i class="fa-solid fa-user-plus"
                                        style="color: white; background-color: green; padding: 14px; border-radius: 6px;"></i>
                                </div>
                                <strong style="color: green;">Invite</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <section class="button-section mt-5">
                <div class="container">
                    <div class="row justify-content-center align-items-center text-center"
                        style="gap: 20px; cursor: pointer;">
                        <a class="col-lg-5 d-flex justify-content-center pack" href=
						"{{ route('packages') }}"
                            style="text-decoration: none;">
                            <button class="btn"
                                style="color: white; font-size: 20px; margin-top: 10px;">Packages</button>
                        </a>
                        <a class="col-lg-5 d-flex justify-content-center pack"
                            href=
                            {{-- {{route('subscribe')}} --}}
                            {{ route('packages') }}
                             style="text-decoration: none;">
                            <button class="btn"
                                style="color: white; font-size: 20px; margin-top: 10px;">Boost Your Subscribe</button>
                        </a>
                    </div>
                </div>
            </section>
        </section>

        <style>
            @media (max-width: 767px) {
                .container .row {
                    display: flex;
                    justify-content: space-between;
                }

                .pack {
                    margin-top: 20px;
                }

                .back {
                    height: 150vh;
                    /* 100% of viewport height for larger screens */
                }

                .active {
                    display: none;
                }
            }
        </style>


        <style>
            @media (max-width: 767px) {
                .container .row {
                    display: block;
                }
            }
        </style>
        <!-- </section> -->




@endsection
        {{-- <footer class="footer" style="background-color: #263238; margin-top: 30px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo" style="color: white; padding: 20px;">

                            <a href='{{route('webpage')}}' style="text-decoration: none;">
                                <h3 style="color: white; "><i>MyDigiDollar</i>
                                </h3>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="privicy" style="color: white;  padding: 20px; font-weight: bold;">
                            <a href="{{route('privacy')}}"
                                style="text-decoration: none; color: white; text-decoration-line: underline;">
                                <h6>
                                    Privacy Policy
                                </h6>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="about" style="color: white;  padding: 20px; font-weight: bold;">
                            <a href="{{route('about')}}"
                                style="text-decoration: none; color: white; text-decoration-line: underline;">
                                <h6>About us</h6>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="contact" style="color: white;  padding: 20px; font-weight: bold;">
                            <a href="{{route('contact')}}"
                                style="text-decoration: none; color: white; text-decoration-line: underline;">
                                <h6>Contact Us</h6>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
            <footer>
                <div class="container">
                    <div class="row">
                        <p class="text-center" style="color: white; font-size: 13px;">Copyright © 2024
                            MyDigidollar.com
                            |
                            Powered by MyDigidollar.com</p>
                    </div>
                </div>
            </footer>

        </footer> --}}


</body>

<script>
    const slider = document.querySelector('.slider');
    const sliderBar = document.querySelector('.slider-bar');
    const rightImage = document.querySelector('.image.right');

    let isDragging = false;

    sliderBar.addEventListener('mousedown', () => {
        isDragging = true;
    });

    document.addEventListener('mousemove', (e) => {
        if (!isDragging) return;

        const rect = slider.getBoundingClientRect();
        let offsetX = e.clientX - rect.left;

        if (offsetX < 0) offsetX = 0;
        if (offsetX > rect.width) offsetX = rect.width;

        const percentage = (offsetX / rect.width) * 100;
        sliderBar.style.left = `${percentage}%`;
        rightImage.style.clipPath = `inset(0 0 0 ${percentage}%)`;
    });

    document.addEventListener('mouseup', () => {
        isDragging = false;
    });
</script>

</html>
