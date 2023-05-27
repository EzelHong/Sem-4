Public Class Form1

    Private Sub btnPractice_Click(sender As Object, e As EventArgs) Handles btnPractice.Click
        Dim practiceForm As New PracticeForm()
        practiceForm.Show()
        Me.Hide()
    End Sub

    Private Sub btnScoring_Click(sender As Object, e As EventArgs) Handles btnScoring.Click
        Dim scoringForm As New ScoringForm()
        scoringForm.Show()
        Me.Hide()
    End Sub

    Private Sub btnAnswer_Click(sender As Object, e As EventArgs) Handles btnAnswer.Click
        Dim answerForm As New AnswerForm()
        answerForm.Show()
        Me.Hide()
    End Sub
End Class
